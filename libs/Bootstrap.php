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
     * @var array
     */
    private $_url = null;
    /**
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

		if(empty($this->_url[0]) || $this->_url[0] =="index.php"){
            if ($this->_loadDefaultController()==false){
                return false;
            }
			return false;
		}
        $this->_loadExistingController();
        $this->_callControllerMethod();

	}

    private function _getUrl()
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url,'/');
        $url = filter_var($url,FILTER_SANITIZE_URL);
        $this->_url = explode("/",$url);
	}

    private function _loadDefaultController()
    {
        require ROOT . "controllers/index.php";
        $this->_controller = new Index();
        //$this->_controller->loadModel("index");
        $this->_controller->index();
	}

    private function _loadExistingController()
    {
        $file = "controllers/".$this->_url[0].".php";
        if(file_exists($file)){
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0]);
        }
        else {
            $this->_error();
            return false;
        }

	}

    private function _callControllerMethod()
    {
        $length = count($this->_url);

        switch ($length){
            case 5:
                break;
            case 4:
                break;
            case 3:
                break;
            case 2:
                break;
        }

        if(isset($this->_url[2])){
            if (method_exists($this->_controller, $this->_url[1])) {
                $this->_controller->{$this->_url[1]}($this->_url[2]);
            } else {
                $this->_error();
                return false;
            }
        }
        else {
            if (isset($this->_url[1])){
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}();
                } else {
                    $this->_error();
                    return false;
                }
            }
            else{
                $this->_controller->index();
            }

        }
	}
    private function _error() {
        require ROOT . "controllers/errorpage.php";
        $controller = new ErrorPage();
        $controller->index();
        exit();
    }
}