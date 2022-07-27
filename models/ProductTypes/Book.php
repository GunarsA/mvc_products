<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Book extends Product
{
    protected function validateValue()
    {
        if (!$this->data['weight']) {
            return "Weight was not provided!";
        }

        if (is_numeric($this->data['weight']) && floatval($this->data['weight'] >= 0)) {
            $this->value = 'Weight: ' . $this->data['weight'] . ' KG';
            return "";
        }

        return "Invalid value for weight!";
    }
};
