<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 22:38
 */
class about extends Controller
{

    /**
     * about constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->view->render("about/index");
    }
}