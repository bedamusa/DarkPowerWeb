<?php


namespace DarkPowerWeb\Core;


interface RouterInterface
{
    public function registerRoute(string $route, string $requestMethod, callable $handler);

    public function invoke(string $uri, string $requestMethod);
}