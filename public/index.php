<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\ProductController;

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/add-product', [ProductController::class, 'create']);
$router->post('/add-product', [ProductController::class, 'create']);
$router->get('/delete-product', [ProductController::class, 'delete']);
$router->post('/delete-product', [ProductController::class, 'delete']);
