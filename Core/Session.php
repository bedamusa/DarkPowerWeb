<?php


namespace DarkPowerWeb\Core;


class Session implements SeesionInterface
{
    private $data = [];

    /**
     * Session constructor.
     * @param array $data
     */
    public function __construct(&$data)
    {
        $this->data = &$data;
    }

    public function exists($key)
    {
        return array_key_exists($key, $this->data);
    }

    public function get($key)
    {
        return $this->data[$key];
    }

    public function set($key, $value)
    {
       $this->data = $value;
    }

    public function delete($key)
    {
        unset($this->data[$key]);
    }

    public function destroy()
    {
        unset($this->data);
        session_destroy();
    }
}