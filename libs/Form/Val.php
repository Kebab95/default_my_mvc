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

    public function minlength($data, $arg)
    {
        if (strlen($data)<$arg){
            return 'Your string can only be '.$arg.' long';
        }
    }
    public function mmaxlength($data, $arg)
    {
        if (strlen($data)>$arg){
            return 'Your string can only be '.$arg.' long';
        }
    }
    public function integer($data)
    {
        if (!ctype_digit($data)){
            return 'Your string must be a digit';
        }
    }

    function __call($name, $arguments)
    {
        throw new Exception($name." does not exist inside of :".__CLASS__);
    }

}