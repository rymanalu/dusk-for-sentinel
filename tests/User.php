<?php

use Cartalyst\Sentinel\Users\UserInterface;

class User implements UserInterface
{
    public function find()
    {
        return $this;
    }

    public function first()
    {
        return $this;
    }

    public function where($attribute, $value)
    {
        return $this;
    }

    public function getUserId()
    {
        return 12;
    }

    public function getUserLogin()
    {
        return 'roni@example.com';
    }

    public function getUserLoginName()
    {
        return 'email';
    }

    public function getUserPassword()
    {
        return 'p4ssw0rd';
    }
}
