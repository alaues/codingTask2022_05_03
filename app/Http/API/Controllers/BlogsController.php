<?php

namespace App\Http\API\Controllers;

use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Enums\Error;
use App\Providers\ServiceLocator;

class BlogsController extends ApiController
{
    private BlogRepositoryInterface $blogRepository;

    public function __construct()
    {
        $this->blogRepository = ServiceLocator::get(BlogRepositoryInterface::class);
    }

    public function index()
    {
        try {
            return $this->sendOutput($this->blogRepository->getAll());
        } catch (\Exception) {
            return $this->sendOutput(['status' => Error::SYSTEM_ERROR]);
        }
    }

    /**
     * @param int $blogId
     * @return void
     */
    public function show(int $blogId)
    {
        $blog = $this->blogRepository->findById($blogId);
        if ($blog) {
            return $this->sendOutput($blog);
        }

        return $this->send404($blog);
    }
}