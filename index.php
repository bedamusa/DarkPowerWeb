<?php

require_once __DIR__ . '/vendor/autoload.php';

$router = new \DarkPowerWeb\Core\Router();
/*
$router->registerRoute('profile\/(.*?)\/edit', 'GET',
                        function ($matches) {
                            (new DarkPowerWeb\Controller\UserController())->editProfile($matches[1][0]);
                        });
*/
$self = $_SERVER['PHP_SELF'];
$junk = str_replace('index.php', '', $self);
$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);
$controllerName = array_shift($uriInfo);
$methodName = array_shift($uriInfo);
$context = new \DarkPowerWeb\Core\Context($controllerName, $methodName, $uriInfo);
$dpweb = new DarkPowerWeb\Core\Application($context, $uri, $_SERVER, $router);
$dpweb->registerDependency(\DarkPowerWeb\Core\ViewInterface::class,
    \DarkPowerWeb\Core\View::class);
$dpweb->registerDependency(\DarkPowerWeb\Core\SeesionInterface::class,
\DarkPowerWeb\Core\Session::class);
/*
$dpweb->addClass(\DarkPowerWeb\Database\DatabaseInterface::class,
           \DarkPowerWeb\Database\Database::getInstance('fff','fff','fff','fff',
               'fff') );
*/
$dpweb->start();