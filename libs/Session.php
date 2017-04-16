<?php

/**
 * Class Session
 */
class Session
{
    /**
     * Session start
     */
    public static function init()
    {
        session_start();
    }

    /**
     * Set Session variable
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get Session variable
     * @param string $key
     * @return string mixed
     */
    public static function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * Session Destroy
     */
    public static function destroy()
    {
        //unset($_SESSION);
        session_destroy();
    }

    /**
     * Is set Session variable
     * @param string $key
     * @return bool
     */
    public static function issetVal($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param string $key
     */
    public static function unsetVal($key)
    {
        unset($_SESSION[$key]);
    }
}