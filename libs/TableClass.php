<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.21.
 * Time: 20:33
 */
abstract class TableClass
{
    private $data = array();
    private $valid_fields = array();

    function __construct(array $fields){
        $this->valid_fields = $fields;
    }
    public function __set($key, $value)
    {
        if (in_array($key, $this->valid_fields)) {
            $this->data[$key] = $value;
        }
    }

    // Magic getter
    public function __get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
    }

    protected function getValue($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }else{
            return null;
        }
    }

    protected function setValue($key, $value)
    {
        if (in_array($key, $this->valid_fields)) {
            $this->data[$key] = $value;
        }
    }
}