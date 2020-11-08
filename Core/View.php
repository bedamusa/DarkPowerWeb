<?php


namespace DarkPowerWeb\Core;


class View implements ViewInterface
{
    const VIEW_FOLDER = 'View/';
    const VIEW_EXTENTION = '.php';
    private $context;

    public function __construct(ContextInterface $context)
    {
        $this->context = $context;
    }


    public function render($model = null, $viewName = null)
    {
        if ($viewName != null) {
            if (strstr($viewName, ".")) {
                include self::VIEW_FOLDER . $viewName;
            } else include self::VIEW_FOLDER . $viewName . self::VIEW_EXTENTION;
        } else {
            $folder = strtolower($this->context->getControllerName());
            $name = strtolower($this->context->getActionName());
            $viewName = $folder . DIRECTORY_SEPARATOR . $name;
            include self::VIEW_FOLDER . $viewName . self::VIEW_EXTENTION;
        }
    }
}