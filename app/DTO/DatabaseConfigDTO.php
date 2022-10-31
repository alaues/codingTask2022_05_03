<?php

namespace App\DTO;

class DatabaseConfigDTO
{

    /**
     * @param string $host
     * @param int $port
     * @param string $dbname
     * @param string $user
     * @param string $password
     */
    public function __construct(public string $host,
                                public int $port,
                                public string $dbname,
                                public string $user,
                                public string $password)
    {
    }
}