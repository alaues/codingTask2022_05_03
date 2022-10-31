<?php

namespace App\Entities;

class Blog
{
    public function __construct(
        public int $id,
        public string $title,
        public \Datetime $created_at,
        public \DateTime $updated_at)
    {
    }
}