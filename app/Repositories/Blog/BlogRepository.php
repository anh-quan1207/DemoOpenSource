<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function getModel()
    {
        return Blog::class;
    }

    public function getLatestBlogs()
    {
        return $this->model->orDerby('id', 'desc')
                    ->limit(3)
                    ->get();
    }
}
