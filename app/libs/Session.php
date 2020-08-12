<?php

namespace libs;

class Session
{
    private const TOKEN = 'token';

    public static function sessionExists($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        }

        return false;
    }

    public static function setSession($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function getSession($name)
    {
        if (self::sessionExists($name)) {
            return $_SESSION[$name];
        }
    }

    public static function deleteSession($name)
    {
        if (self::sessionExists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function setToken()
    {
        return self::setSession(self::TOKEN, md5(uniqid(rand(), true)));
    }
}
