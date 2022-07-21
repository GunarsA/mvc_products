<?php

namespace app\core;

class Router
{
    private array $getRoutes = [];
    private array $postRoutes = [];

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
        if (strpos($url, '?')) {
            $url = substr($url, 0, strpos($url, '?'));
        }
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }

        if ($fn) {
            call_user_func($fn);
        } else {
           echo "Page Not Found";
        }
    }
}
