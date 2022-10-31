<?php

namespace App\Clients;

use App\Exceptions\DatabaseException;

class MysqlClient
{
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @param string $host
     * @param int $port
     * @param string $dbname
     * @param string $user
     * @param string $password
     * @return \PDO
     * @throws DatabaseException
     */
    public static function getInstance(string $host,
                                       int $port,
                                       string $dbname,
                                       string $user,
                                       string $password): \PDO
    {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        try {
            $dsn = sprintf("mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4", $host, $port, $dbname);
            self::$instance = new \PDO($dsn, $user, $password);

            return self::$instance;
        } catch (\PDOException $exception) {
            throw new DatabaseException();
        }
    }
}