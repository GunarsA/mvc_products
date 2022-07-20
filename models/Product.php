<?php

namespace app\models;

use app\core\Database;

abstract class Product
{
    public ?string $sku;
    public ?string $name;
    public ?float $price;
    public ?string $type;
    public ?string $value;

    public function load($data)
    {
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = floatval($data['price']);
        $this->type = $data['type'];
        $this->value = $data['value'];
    }

    public function validateData()
    {
        $errors = [];
        if ($this->validateSku()) {
            $errors[] = $this->validateSku();
        }
        if ($this->validateName()) {
            $errors[] = $this->validateName();
        }
        if ($this->validatePrice()) {
            $errors[] = $this->validatePrice();
        }
        if ($this->validateType()) {
            $errors[] = $this->validateType();
        }
        if ($this->validateValue()) {
            $errors[] = $this->validateValue();
        }
        return $errors;
    }

    public function validateSku()
    {
        $db = new Database();
        if ($db->getProduct($this->sku)) {
            return "SKU already taken. Choose different one!";
        }
        return "";
    }

    public function validateName()
    {
        if ($this->name === '') {
            return "Enter valid name!";
        }
        return "";
    }

    public function validatePrice()
    {
        if (filter_var($this->price, FILTER_VALIDATE_FLOAT) && (strlen($this->price) > 0) && floatval($this->price >= 0)) {
            return "";
        }
            return "Enter valid price!";
    }

    public function validateType()
    {
        if($this->type !== 'DVD' && $this->type !== 'Book' && $this->type !== 'Furniture') {
            return "Choose valid type!";
        }
        return "";
    }

    public function validateValue() 
    {
        return "";
    }
}
