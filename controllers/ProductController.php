<?php

namespace app\controllers;

use app\core\Database;
use app\models\ProductTypes\{Disc, Book, Furniture, Invalid};
use app\view\ProductView;

class ProductController
{
    public static function index()
    {
        $db = new Database();
        ProductView::renderView('list', [
            'products' => $db->getProducts()
        ]);
    }

    public static function create()
    {
        $productData = [];
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach($_POST as $key => $value){
                $productData[$key] = $value;
            }

            switch ($productData['type'] ?? '') {
                case 'DVD':
                    $product = new Disc($productData);
                    break;
                case 'Book':
                    $product = new Book($productData);
                    break;
                case 'Furniture':
                    $product = new Furniture($productData);
                    break;
                default:
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

        ProductView::renderView('/add', [
            'errors' => $errors,
            'product' => $productData
        ]);
    }

    public static function delete()
    {
        if($_POST) {
            $db = new Database();
            foreach ($_POST as $key => $value) {
                $db->deleteProduct($key);
            }
        }
        header('Location: /');
    }

    public static function read() {
        header('Content-Type: application/json');
        $db = new Database();
        echo json_encode($db->getProduct($_GET['sku']));
    }
}

