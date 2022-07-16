<?php

namespace app\models\Products;

use app\models\Product;
use app\models\ProductValidate;

class Disc extends Product implements ProductValidate
{
    public function validateValue()
    {
        return true;
    }
};
