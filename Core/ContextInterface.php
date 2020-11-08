<?php


namespace DarkPowerWeb\Core;


interface ContextInterface
{
    public function getControllerName();
    public function getActionName();
    public function getParams();
}