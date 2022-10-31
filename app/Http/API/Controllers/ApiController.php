<?php

namespace App\Http\API\Controllers;

use App\Enums\Error;

class ApiController
{
    private const CONTENT_TYPE_JSON_HEADER = ['Content-Type: application/json', 'HTTP/1.1 200 OK'];

    /**
     * Send API output.
     *
     * @param mixed $data
     */
    protected function sendOutput(array $data)
    {
        foreach (self::CONTENT_TYPE_JSON_HEADER as $httpHeader) {
            header($httpHeader);
        }

        echo json_encode($data);
        exit;
    }

    /**
     * @return void
     */
    protected function send404()
    {
        foreach (self::CONTENT_TYPE_JSON_HEADER as $httpHeader) {
            header($httpHeader);
        }

        http_response_code(404);
        echo json_encode(['status' => Error::BLOG_NOT_FOUND]);
        exit;
    }
}