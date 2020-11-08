<?php


namespace DarkPowerWeb\Core;


class Context implements ContextInterface
{
    private $controllerName;
    private $actionName;
    private $params = [];

    public function __construct($controllerName, $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams(): array
    {
        return $this->params;
    }


}