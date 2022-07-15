<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

use app\core\Router;
use app\controllers\ProductController;
use app\core\Database;

$database = new Database();
$router = new Router($database);

$router->get('/', [ProductController::class, 'index']);
$router->get('/add-product', [ProductController::class, 'create']);
$router->post('/add-product', [ProductController::class, 'create']);
$router->get('/delete-product', [ProductController::class, 'delete']);
$router->post('/delete-product', [ProductController::class, 'delete']);

$router->resolve();
