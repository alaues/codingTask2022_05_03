<?php

namespace App\Kernel;

use App\Providers\ServiceProvider;

class Kernel
{

    /**
     * @return void
     * @throws \App\Exceptions\DatabaseException
     */
    public static function load(): void
    {
        ServiceProvider::boot();
    }
}