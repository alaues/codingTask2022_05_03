<?php

namespace App\Repositories;

use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Models\Database\Blog;
use App\Entities\Blog as BlogEntity;

class BlogRepository implements BlogRepositoryInterface
{
    /**
     * @return \App\Entities\Blog[] array
     * @throws \Exception
     */
    public function getAll(): array
    {
        $model = new Blog();
        $blogs = [];
        foreach ($model->getAll() as $blog) {
            $blogs[] = new BlogEntity(
                $blog['id'],
                $blog['title'],
                new \DateTime($blog['created_at']),
                new \DateTime($blog['updated_at'])
            );
        }
        return $blogs;
    }

    /**
     * @param int $blodId
     * @return BlogEntity|null
     * @throws \Exception
     */
    public function findById(int $blodId): ?BlogEntity
    {
        $model = new Blog;
        if ($blog = $model->getById($blodId)) {
            return new BlogEntity(
                $blog['id'],
                $blog['title'],
                new \DateTime($blog['created_at']),
                new \DateTime($blog['updated_at'])
            );
        }
        return null;
    }

    public function delete(int $blodId)
    {
        // TODO: Implement delete() method.
    }
}