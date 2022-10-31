<?php

namespace App\Contracts\Adapters;

interface DatabaseAdapterInterface
{

    /**
     * @param string $query
     * @param array $options
     * @return mixed
     */
    public function query(string $query, array $options);

    /**
     * @param string $query
     * @param array $options
     * @return mixed
     */
    public function queryOne(string $query, array $options);
}