<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:20
 */
abstract class Controller
{
    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    abstract public function index();

    /**
     * Variable for page View
     * @var View
     */
    protected $view;

    /**
     * Variable for page Model
     * @var Model
     */
    protected $model;

    /**
     * The Constructor create a new View class
     * Controller constructor.
     */
    public function __construct()
    {
        //echo "Main Controller";
        $this->view = new View();

    }

    /**
     * This function load the model for View
     * @param $name string
     */
    public function loadModel($name)
    {
        $path = ROOT . MODELS . $name . "_model.php";
        if (file_exists($path)) {
            require $path;

            $modelName = $name . '_Model';
            $this->model = new $modelName;
        }
    }


}