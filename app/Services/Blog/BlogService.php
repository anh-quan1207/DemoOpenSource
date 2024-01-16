<?php

namespace App\Services\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->repository = $blogRepository;
    }

    public function getLatestBlogs()
    {
        return $this->repository->getLatestBlogs();
    }
}
