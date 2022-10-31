<?php

use App\Http\API\Controllers\AuthController;
use App\Http\API\Controllers\BlogsController;

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);

$prefix = '/api';
$endpoint = $method . ':' . ltrim($request,$prefix);

switch ($endpoint) {
    case 'post:auth':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'get:blogs':
        $controller = new BlogsController();
        $controller->index();
        break;
    case (bool)preg_match("/^get:blogs\/\d{1,}$/", $endpoint) :
        $query = explode('/', $endpoint);
        $controller = new BlogsController();
        $controller->show(end($query));
        break;
    default:
        http_response_code(404);
        break;
}
