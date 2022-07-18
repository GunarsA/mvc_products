<?php

namespace app\controllers;

use app\core\Database;
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

        // echo '<pre>';
        // var_dump($products);
        // echo '</pre>';
    }

    public function create()
    {
        $productData = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $productData['sku'] = $_POST['sku'];
            $productData['name'] = $_POST['name'];
            $productData['price'] = $_POST['price'];
            $productData['type'] = $_POST['type'];
            $productData['value'] = $_POST['value'];

            switch ($productData['type']) {
                case 0:
                    $product = new Disc();
                    break;
                case 1:
                    $product = new Book();
                    break;
                case 2:
                    $product = new Furniture();
                    break;
            }

            $product->load($productData);
            $errors = $product->validateData();

            if (empty($errors)) {
                $db = new Database();
                $db->createProduct($product);
            }

            header('Location: /');
            exit;
        }

        ProductView::renderView('/add', [
            'product' => $productData
        ]);
    }

    public static function delete()
    {
        echo "<h1> Delete page </h1>";

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';

        $id = $_POST ?? null;
        if (!$id) {
            header('Location: /');
            exit;
        }

        // if ($router->database->deleteProduct($id)) {
        //     header('Location: /products');
        //     exit;
        // }
    }
}
