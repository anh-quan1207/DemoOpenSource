<?php

namespace App\Services\Product;

use App\Services\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface
{
    public function getRelatedProducts($product);
    public function getFeaturedProducts();
    public function getProductsOnIndex($request);
    public function getProductsByCategory($categoryName, $request);
}
