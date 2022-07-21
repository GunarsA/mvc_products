<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Invalid extends Product
{
    protected function validateValue()
    {
        return "Validity of value couldn't be confirmed due to the product type being invalid!";
    }
}
