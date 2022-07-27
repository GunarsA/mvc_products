<?php

namespace app\core;

use app\models\Product;
use PDO;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . DB_HOST . ';port=3306;', DB_USER, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $this->pdo->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'products_server';");
        if (!$statement->fetchColumn()) {
            $statement = $this->pdo->prepare(
                "CREATE DATABASE products_server;
                USE products_server;
                CREATE TABLE `products` (
                    `sku` varchar(255) COLLATE utf8_bin NOT NULL,
                    `name` varchar(255) COLLATE utf8_bin NOT NULL,
                    `price` float NOT NULL,
                    `type` varchar(255) COLLATE utf8_bin NOT NULL,
                    `value` varchar(255) COLLATE utf8_bin NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
              
                INSERT INTO `products` (`sku`, `name`, `price`, `type`, `value`) VALUES
                    ('GGWP0007', 'War and Peace', 20, 'Book', 'Weight: 2 KG'),
                    ('JVC200123', 'Acme DISC', 1, 'DVD', 'Size: 700 MB'),
                    ('TR120555', 'Chair', 40, 'Furniture', 'Dimensions: 24x45x15 CM');
              
              
                ALTER TABLE `products`
                    ADD PRIMARY KEY (`sku`);
                COMMIT;"
            );
            $statement->execute();
            $statement->closeCursor();
        }

        $this->pdo->query("USE products_server;");
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY sku');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($sku)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($sku)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);

        return $statement->execute();
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, value)
                VALUES (:sku, :name, :price, :type, :value)");

        $statement->bindValue(':sku', $product->sku);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':type', $product->type);
        $statement->bindValue(':value', $product->value);

        $statement->execute();
    }
}
