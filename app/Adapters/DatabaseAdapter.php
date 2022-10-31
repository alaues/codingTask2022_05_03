<?php

namespace App\Adapters;

use App\Clients\MysqlClient;
use App\Contracts\Adapters\DatabaseAdapterInterface;
use App\DTO\DatabaseConfigDTO;
use App\Exceptions\DatabaseException;

class DatabaseAdapter implements DatabaseAdapterInterface
{
    private \PDO $connector;

    /**
     * @throws DatabaseException
     */
    public function __construct(DatabaseConfigDTO $configDTO)
    {
        $this->connect($configDTO);
    }

    /**
     * @throws DatabaseException
     */
    private function connect(DatabaseConfigDTO $configDTO)
    {
        $this->connector = MysqlClient::getInstance(
            $configDTO->host,
            $configDTO->port,
            $configDTO->dbname,
            $configDTO->user,
            $configDTO->password
        );
    }

    /**
     * @param string $query
     * @param array $options
     * @return mixed
     */
    public function query(string $query, array $options = [])
    {
        $stmt = $this->connector->prepare($query);
        $stmt->execute($options);
        return $stmt->fetchAll();
    }

    /**
     * @param string $query
     * @param array $options
     * @return mixed
     */
    public function queryOne(string $query, array $options = [])
    {
        $stmt = $this->connector->prepare($query);
        $stmt->execute($options);
        return $stmt->fetch();
    }
}