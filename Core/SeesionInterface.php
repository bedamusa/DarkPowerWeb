<?php


namespace DarkPowerWeb\Core;


interface SeesionInterface
{
    public function exists($key);
    public function get($key);
    public function set($key, $value);
    public function delete($key);
    public function destroy();
}