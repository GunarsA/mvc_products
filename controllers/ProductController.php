<?php

namespace app\controllers;

use app\models\Product;
use app\Database;

class ProductController
{
    public static function index(Database $DB)
    {
        echo '<h1> Index Page </h1>';
        $keyword = $_GET['search'] ?? '';
        $products = $DB->getProducts($keyword);

        echo '<pre>';
        var_dump($products);
        echo '</pre>';
    }
    public static function create()
    {
        echo "Create page";
    }
    public static function delete()
    {
        echo "Delete page";
    }
}
