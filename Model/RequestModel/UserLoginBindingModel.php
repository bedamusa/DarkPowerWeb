<?php


namespace DarkPowerWeb\Model\RequestModel;


class UserLoginBindingModel
{
    private $username;
    private $password;
    private $remember;
    private $csrf_token;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRemember()
    {
        return $this->remember;
    }

    public function setRemember($remember)
    {
        $this->remember = $remember;
    }

    public function getCsrfToken()
    {
        return $this->csrf_token;
    }

    public function setCsrfToken($csrf_token)
    {
        $this->csrf_token = $csrf_token;
    }

}