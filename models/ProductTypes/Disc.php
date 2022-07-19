<?php

namespace app\models\ProductTypes;

use app\models\Product;
use app\models\ProductValidate;

class Disc extends Product implements ProductValidate
{
    public function validateValue()
    {
        return "";
    }
};
