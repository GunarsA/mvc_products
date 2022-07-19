<?php

namespace app\models;

abstract class Product
{
    public string $sku;
    public string $name;
    public float $price;
    public string $type;
    public string $value;

    public function load($data)
    {
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->type = $data['type'];
        $this->value = $data['value'];
    }

    public function validateData()
    {
        if (!$this->validateSku()) {
            return false;
        }
        if (!$this->validateName()) {
            return false;
        }
        if (!$this->validatePrice()) {
            return false;
        }
        if (!$this->validateType()) {
            return false;
        }
        if (!$this->validateValue()) {
            return false;
        }
        return true;
    }

    public function validateSku()
    {
        return true;
    }

    public function validateName()
    {
        return true;
    }

    public function validatePrice()
    {
        return true;
    }

    public function validateType()
    {
        return true;
    }

    abstract public function validateValue();
}
