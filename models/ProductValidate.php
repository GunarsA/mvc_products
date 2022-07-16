<?php

namespace app\models;

interface ProductValidate
{
    public function validateSku();
    public function validateName();
    public function validatePrice();
    public function validateType();
    public function validateValue();
};
