<?php

namespace app\models;

use app\core\Database;
class Product
{
    public string $sku;
    public string $name;
    public float $price;
    public int $type;
    public string $value;

    public function load($data)
    {
        $this->sku = $data->sku;
        $this->name = $data->name;
        $this->price = $data->price;
        $this->type = $data->type;
        $this->value = $data->value;
    }

    public function save()
    {
    }
}
