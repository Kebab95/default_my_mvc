<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:20
 */
abstract class Controller
{
    abstract public function index();
    /**
     * @var View
     */
    protected $view;
    /**
     * @var Model
     */
    protected $model;
	/**
	 * Controller constructor.
	 */
	public function __construct()
	{
		//echo "Main Controller";
		$this->view = new View();

	}

    public function loadModel($name)
    {
        $path = ROOT."models/".$name."_model.php";
        if (file_exists($path)){
            require $path;

            $modelName = $name.'_Model';
            $this->model = new $modelName;
        }
	}



}