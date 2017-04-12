<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:15
 */
class ErrorPage extends Controller
{

	/**
	 * Error constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		//echo "Error";
		$this->view->msg ="nem létezik";

	}

    public function index()
    {
        $this->view->render("error/index");
    }
}