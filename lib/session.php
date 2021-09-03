<?php
namespace lib;

class session 
{
    static function startSession()
    {
        return session_start();
    }

    static function setSession( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public function getSession($value)
    {
        return $_SESSION[$value];
    }

    static function removeParamSession( $param )
    {
        unset($_SESSION[$param]);
    }

    static function unsetSession()
    {
        session_unset();
    }
}