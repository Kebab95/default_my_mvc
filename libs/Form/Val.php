<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 18:06
 */
class Val
{

    /**
     * Val constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $data
     * @param integer $arg
     * @return string|false
     */
    public function minlength($data, $arg)
    {
        if (strlen($data)<$arg){
            return 'Your string can only be '.$arg.' long';
        }
        else {
            return false;
        }
    }

    /**
     * @param string $data
     * @param integer $arg
     * @return string|false
     */
    public function maxlength($data, $arg)
    {
        if (strlen($data)>$arg){
            return 'Your string can only be '.$arg.' long';
        }
        else {
            return false;
        }
    }

    /**
     * @param integer $data
     * @return string|false
     */
    public function integer($data)
    {
        if (!ctype_digit($data)){
            return 'Your string must be a digit';
        }
        else {
            return false;
        }
    }

    /**
     * @param string $name
     * @param $arguments
     * @throws Exception
     */
    function __call($name, $arguments)
    {
        throw new Exception($name." does not exist inside of :".__CLASS__);
    }

}