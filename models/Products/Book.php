<?php

namespace app\models\Products;

use app\models\Product;
use app\models\ProductValidate;

class Book extends Product implements ProductValidate
{
    public function validateValue()
    {
        return true;
    }
};
