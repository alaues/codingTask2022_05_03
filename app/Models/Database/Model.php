<?php
namespace App\Models\Database;

use App\Contracts\Adapters\DatabaseAdapterInterface;
use App\Exceptions\UndefinedServiceException;
use App\Providers\ServiceLocator;

class Model
{
    protected DatabaseAdapterInterface $databaseAdapter;

    /**
     * @throws UndefinedServiceException
     */
    public function __construct()
    {
        $this->databaseAdapter = ServiceLocator::get(DatabaseAdapterInterface::class);
    }
}