<?php

namespace App\Services\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Services\BaseService;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;

    public function __construct(ProductCategoryRepositoryInterface $ProductCategoryRepository)
    {
        $this->repository = $ProductCategoryRepository;
    }
}
