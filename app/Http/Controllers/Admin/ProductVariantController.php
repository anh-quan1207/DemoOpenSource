<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = $this->productService->find($product_id);
        $productDetails = $product->productDetails;

        return view('admin.product.variant.index', compact('product', 'productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = $this->productService->find($product_id);

        return view('admin.product.variant.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();
        ProductDetail::create($data);
        $this->updateQTY($product_id);

        return redirect('admin/product/' . $product_id . '/variant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $product_detail_id)
    {
        $product = $this->productService->find($product_id);
        $product_detail = ProductDetail::find($product_detail_id);

        return view('admin.product.variant.edit', compact('product', 'product_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $data = $request->all();
        ProductDetail::find($product_detail_id)->update($data);
        $this->updateQTY($product_id);

        return redirect('admin/product/' . $product_id . '/variant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();
        $this->updateQTY($product_id);

        return redirect('admin/product/' . $product_id . '/variant');
    }

    public function updateQTY($product_id)
    {
        $product = $this->productService->find($product_id);
        $productDetails = $product->productDetails;

        $totalQTY = array_sum(array_column($productDetails->toArray(), 'qty'));
        $this->productService->update(['qty' => $totalQTY], $product_id);
    }
}
