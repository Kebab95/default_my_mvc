<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:33
 */
abstract class Model
{
    /**
     * Variable for Page Database connects
     * @var Database
     */
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


}