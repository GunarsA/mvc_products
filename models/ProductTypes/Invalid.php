<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Invalid extends Product
{
    protected function validateValue()
    {
        return "Cannot check the validity of value because the product type is invalid!";
    }
}
