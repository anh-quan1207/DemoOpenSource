<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getRelatedProducts($product);
    public function getFeaturedProductsByCategory(int $category);
    public function getProductsOnIndex($request);
    public function getProductsByCategory($categoryName, $request);
}
