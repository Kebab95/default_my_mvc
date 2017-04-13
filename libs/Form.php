<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 17:48
 *
 *
 *
 */
class Form
{
    /**
     * @var string $_currentItem
     */
    private $_currentItem = null;
    /**
     * @var array $_postData
     */
    private $_postData = array();

    /**
     * @var Val
     */
    private $_val;
    /**
     * @var array
     */
    private $_error = array();

    /**
     * Form constructor.
     */
    public function __construct()
    {
        $this->_val = new Val();
    }

    /**
     * This is to run $_POST
     * @param string $field
     * @return Form
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    /**
     * @param mixed $fieldName
     * @return mixed String or array
     */
    public function fetch($fieldName = false)
    {
        if ($fieldName) {
            if (isset($this->_postData[$fieldName])) {
                return $this->_postData[$fieldName];
            } else {
                return false;
            }

        } else {
            return $this->_postData;
        }

    }

    /**
     * Validate
     */
    public function val($typeOfValidator, $arg = false)
    {
        if ($arg != false) {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
        } else {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        }

        if ($error) {
            $this->_error[$this->_currentItem] = $error;
        }
        return $this;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function submit()
    {
        if (empty($this->_error)) {
            return true;
        } else {
            throw new Exception(implode(", ", $this->_error));
        }
    }
}