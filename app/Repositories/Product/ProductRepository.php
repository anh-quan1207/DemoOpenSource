<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getRelatedProducts($product)
    {
        $relatedProducts = $this->model->where('product_category_id', $product->product_category_id)
                    ->where('tag', $product->tag)
                    ->limit(4)
                    ->get();

        return $relatedProducts->filter(function ($relatedProduct) use ($product) {
            return $relatedProduct->id !== $product->id;
        });
    }

    public function getFeaturedProductsByCategory(int $category)
    {
        return $this->model->where('featured', true)
            ->where('product_category_id', $category)
            ->get();
    }

    public function getProductsOnIndex($request)
    {
        $search = $request->search ?? '';
        $products = $this->model->where('name', 'like', '%'.$search.'%');
        $products = $this->filter($products, $request);

        return $this->sortAndPagination($products, $request);
    }

    public function getProductsByCategory($categoryName, $request)
    {
        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery();
        $products = $this->filter($products, $request);

        return $this->sortAndPagination($products, $request);
    }

    private function sortAndPagination($products, Request $request)
    {
        $productsPerPage = $request->show ?? 9;
        $sort = $request->sort ?? 'newest';
        switch ($sort) {
            case 'newest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            default:
                $products = $products->orderBy('id');
        }
        return $products->paginate($productsPerPage)->appends(['sort' => $sort, 'show' => $productsPerPage]);
    }

    public function filter($products, Request $request)
    {
        //Brands
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);

        //Price
        $priceMin = $request->price_min;
        $priceMax = $request->price_max;

        $priceMin = str_replace('$', '', $priceMin);
        $priceMax = str_replace('$', '', $priceMax);

//        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price', [$priceMin, $priceMax]) : $products;

        //Lọc theo giá giảm (Discount) nếu có, không thì lọc theo giá gốc
        $products = ($priceMin != null && $priceMax != null)
                    ? $products->where(function ($query) use ($priceMin, $priceMax) {
                        $query->whereBetween('Discount', [$priceMin, $priceMax])
                            ->orWhere(function ($query) use ($priceMin, $priceMax) {
                                $query->where('Discount', '=', null)
                                    ->whereBetween('price', [$priceMin, $priceMax]);
                            });
                    })
                    : $products->where(function ($query) use ($priceMin, $priceMax) {
                        $query->where('Discount', '>=', $priceMin)
                            ->orWhere(function ($query) use ($priceMin, $priceMax) {
                                $query->where('Discount', '=', null)
                                    ->where('price', '>=', $priceMin);
                            });
                    });

        //Color
        $color = $request->color;
        $products = $color != null
                    ? $products->whereHas('productDetails', function ($query) use ($color) {
                        return $query->where('color', $color)->where('qty', '>', '0');
                    })
                    : $products;

        //Size
        $size = $request->size;
        $products = $size != null
                    ? $products->whereHas('productDetails', function ($query) use ($size) {
                        return $query->where('size', $size)->where('qty', '>', '0');
                    })
                    : $products;

        return $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;
    }
}
