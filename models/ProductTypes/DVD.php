<?php

namespace app\models\ProductTypes;

use app\models\Product;

class DVD extends Product
{
    protected function validateValue()
    {
        if (!$this->data['size']) {
            return "Size was not provided!";
        }

        if (is_numeric($this->data['size']) && floatval($this->data['size'] >= 0)) {
            $this->value = 'Size: ' . $this->data['size'] . ' MB';
            return "";
        }

        return "Invalid value for size!";
    }
};
