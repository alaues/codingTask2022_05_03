<?php

namespace App\Providers;

use App\Adapters\DatabaseAdapter;
use App\Contracts\Adapters\DatabaseAdapterInterface;
use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Enums\Error;
use App\Exceptions\DatabaseException;
use App\Repositories\BlogRepository;

class ServiceProvider
{

    /**
     * @throws \App\Exceptions\DatabaseException
     */
    public static function boot(): void
    {
        $configProvider = new ConfigProvider();

        try {
            ServiceLocator::add(DatabaseAdapterInterface::class, new DatabaseAdapter($configProvider->getDatabaseConfig()));
        } catch (DatabaseException $exception) {
            die(json_encode(['status' => Error::SYSTEM_ERROR]));
        }

        ServiceLocator::add(BlogRepositoryInterface::class, new BlogRepository());
    }
}