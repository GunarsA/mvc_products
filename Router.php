<?php

namespace app;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }
    public function resolve()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }

        if ($fn) {
            call_user_func($fn);
        } else {
            echo "Page not found";
        }
    }
}
