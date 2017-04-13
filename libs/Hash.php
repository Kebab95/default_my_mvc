<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 1:39
 */
class Hash
{
    /**
     * @param string $algo
     * @param string $data
     * @return string
     */
    public static function create($algo, $data)
    {
        $context = hash_init($algo, HASH_HMAC, HASH_KEY);
        hash_update($context, $data);

        return hash_final($context);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function createMD5($data)
    {
        return self::create("md5", $data);
    }
}