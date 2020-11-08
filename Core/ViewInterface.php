<?php


namespace DarkPowerWeb\Core;


interface ViewInterface
{
    public function render($model = null, $viewName = null);
}