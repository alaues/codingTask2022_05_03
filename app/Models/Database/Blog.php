<?php

namespace App\Models\Database;

use App\Entities\Blog as BlogEntity;

class Blog extends Model
{
    /**
     * @var string
     */
    protected string $table = 'blogs';

    /**
     * @param array $where
     * @param int $limit
     * @param int $offset
     * @return array
     * @throws \Exception
     */
    public function getAll(array $where = [], int $limit = 10, int $offset = 0)
    {
        $query = 'SELECT * FROM ' . $this->table;
        return $this->databaseAdapter->query($query);
    }

    public function getById(int $blodId): array
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        return $this->databaseAdapter->queryOne($query, ['id' => $blodId]);
    }
}