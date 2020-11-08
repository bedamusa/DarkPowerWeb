<?php


namespace DarkPowerWeb\Core;


class Router implements RouterInterface
{
    private $routes = [];

    /**
     * Router constructor.
     * @param array $routes
     */
    public function __construct()
    {
        $this->routes['GET'] = [];
        $this->routes['POST'] = [];
    }


    public function registerRoute(string $route, string $requestMethod, callable $handler)
    {
        $this->routes[$requestMethod][$route] = $handler;

    }

    public function invoke(string $uri, string $requestMethod)
    {
        foreach ($this->routes[$requestMethod] as $route => $handler) {
            $res = preg_match_all('/^'.$route.'', $uri, $matches);
            if (!$res) continue;
            $handler($matches);
           return true;
        }
        return false;
    }
}