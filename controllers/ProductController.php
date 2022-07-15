<?php

namespace app\controllers;

use app\models\Product;
use app\core\Database;
use app\view\ProductView;

class ProductController
{
    public static function index()
    {
        $DB = new Database();
        $products = $DB->getProducts();
        ProductView::renderView('products/list', [
            'products' => $products
        ]);

        // echo '<pre>';
        // var_dump($products);
        // echo '</pre>';
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
