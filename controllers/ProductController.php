<?php

namespace app\controllers;

use app\core\Database;
use app\models\ProductTypes\Invalid;
use app\view\ProductView;

class ProductController
{
    public static function index()
    {
        $db = new Database();
        ProductView::renderView('index', [
            'products' => $db->getProducts()
        ]);
    }

    public static function create()
    {
        $productData = [];
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $productData[$key] = $value;
            }

            $cname = "app\\models\\ProductTypes\\" . $_POST['type'];
            if (class_exists($cname)) {
                $product = new $cname($productData);
            } else {
                $product = new Invalid($productData);
            }

            $errors = $product->validateData();

            if (!$errors) {
                $db = new Database();
                $db->createProduct($product);
                header('Location: /');
                exit;
            }
        }

        ProductView::renderView('add', [
            'errors' => $errors,
            'product' => $productData
        ]);
    }

    public static function delete()
    {
        if ($_POST) {
            $db = new Database();
            foreach ($_POST as $key => $value) {
                $db->deleteProduct($key);
            }
        }
        header('Location: /');
    }

    public static function read()
    {
        header('Content-Type: application/json');
        $db = new Database();
        echo json_encode($db->getProduct($_GET['sku']));
    }
}
