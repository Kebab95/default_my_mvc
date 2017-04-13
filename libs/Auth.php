<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 18:58
 */
class Auth
{
    /**
     * @return bool
     */
    public static function checkedLogged()
    {
        if (Session::get("loggedIn") == true) {
            return true;
        } else {
            return false;
        }
    }
}