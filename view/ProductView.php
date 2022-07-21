<?php

namespace app\view;

class ProductView
{
    public static function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/productViews/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/productViews/_layout.php";
    }
}
