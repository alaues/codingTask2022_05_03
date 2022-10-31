<?php

namespace App\Exceptions;

class UndefinedServiceException extends \Exception
{
    protected $message = 'Undefined service';
}