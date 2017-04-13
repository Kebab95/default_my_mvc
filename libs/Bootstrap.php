<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:11
 */
class Bootstrap
{
    /**
     * URL variable
     * @var array
     */
    private $_url = null;

    /**
     * Variable for page Controller
     * @var Controller
     */
    private $_controller = null;

    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        Session::init();
        $this->_getUrl();


        if (empty($this->_url[0]) || $this->_url[0] == "index.php") {
            if ($this->_loadDefaultController() == false) {
                return false;
            }
            return false;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();

    }

    /**
     * This function generate URL array
     * @return null
     */
    private function _getUrl()
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode("/", $url);
    }

    /**
     *  This function load Default Controller
     *  when is url null or empty
     */
    private function _loadDefaultController()
    {
        require ROOT . CONTROLLERS . "/index.php";
        $this->_controller = new Index();
        //$this->_controller->loadModel("index");
        $this->_controller->index();
    }

    /**
     * Load Controller from first url param
     * @return bool
     */
    private function _loadExistingController()
    {
        $file = CONTROLLERS . $this->_url[0] . ".php";
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0]);
        } else {
            $this->_error();
            return false;
        }

    }

    /**
     * Calling other method when one more url param
     * www.example.com/controller/method/(param1)/(param2)/(param3)/
     * @return bool
     */
    private function _callControllerMethod()
    {
        $length = count($this->_url);
       // var_dump($this->_url);
        if ($length>1 &&$length<6){
            if (method_exists($this->_controller, $this->_url[1])){
                switch ($length) {
                    case 5:
                        $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                        break;
                    case 4:
                        $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                        break;
                    case 3:
                        $this->_controller->{$this->_url[1]}($this->_url[2]);
                        break;
                    case 2:
                        $this->_controller->{$this->_url[1]}();
                        break;
                    default:
                        $this->_controller->index();
                }
            }
            else {
                $this->_error();
                return false;
            }

        }else {
            if (isset($this->_url[1]) && !method_exists($this->_controller, $this->_url[1])){
                $this->_error();
                return false;
            }
            else {
                $this->_controller->index();
            }
        }

    }

    /**
     *  This is Error page
     *  Calling when something error in the Bootstrap
     */
    private function _error()
    {
        require ROOT . CONTROLLERS . "errorpage.php";
        $controller = new ErrorPage();
        $controller->index();
        exit();
    }
}