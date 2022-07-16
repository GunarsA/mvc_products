<?php

namespace app\models\Products;

use app\models\Product;
use app\models\ProductValidate;

class Furniture extends Product implements ProductValidate
{
    public function validateValue()
    {
        return true;
    }
};
