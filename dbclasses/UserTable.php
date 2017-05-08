<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.21.
 * Time: 22:34
 */
class UserTable extends TableClass
{

    static $id = "id";
    static $name = "name";
    static $email = "email";
    
    /**
     * UserTable constructor.
     */
    public function __construct()
    {
        parent::__construct(
            array(
                self::$id,
                self::$name,
                self::$email
            )
        );
    }

    public function asdasd()
    {

        echo "asdasd";
    }

    public function getId()
    {
        return parent::getValue(self::$id);
    }
}