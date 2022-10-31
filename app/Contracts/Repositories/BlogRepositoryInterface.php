<?php

namespace App\Contracts\Repositories;

use App\Entities\Blog;

interface BlogRepositoryInterface
{

    /**
     * Return all blogs
     *
     * @return Blog[]
     */
    public function getAll(): array;

    /**
     * Return blog information
     *
     * @param int $blodId
     * @return Blog
     */
    public function findById(int $blodId): ?Blog;

    public function delete(int $blodId);
}