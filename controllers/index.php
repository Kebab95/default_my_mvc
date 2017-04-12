<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 13:59
 */
class Index extends Controller
{


	/**
	 * Index constructor.
	 */
	public function __construct()
	{
		parent::__construct();

	}

    /**
     * Render View page
     */
    public function index()
    {
        $this->view->render("index/index");
    }
}