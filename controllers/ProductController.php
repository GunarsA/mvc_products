<?php

namespace app\controllers;

use app\core\Database;
use app\models\Product;
use app\models\ProductTypes\{Disc, Book, Furniture};
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
            $productData['sku'] = $_POST['sku'];
            $productData['name'] = $_POST['name'];
            $productData['price'] = $_POST['price'];
            $productData['type'] = $_POST['type'];
            switch ($productData['type']) {
                case 'DVD':
                    $productData['value'] = $_POST['size'] . ' MB';
                    break;
                case 'Book':
                    $productData['value'] = $_POST['weight'] . ' KG';
                    break;
                case 'Furniture':
                    $productData['value'] = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'] . ' CM';
                    break;
                default:
                    $productData['value'] = 'invalid';
            }

            switch ($productData['type']) {
                case 'DVD':
                    $product = new Disc();
                    break;
                case 'Book':
                    $product = new Book();
                    break;
                case 'Furniture':
                    $product = new Furniture();
                    break;
                default:
                    $product = new Product();
            }

            $product->load($productData);
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
        if($db->getProduct($_GET['sku'])){
            echo '{"exists": "true"}';
        }
        else {
            echo '{"exists": "false"}';
        }
    }
}

