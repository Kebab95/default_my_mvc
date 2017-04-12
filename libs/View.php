<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.10.
 * Time: 14:23
 */
class View
{
    /**
     * @var array
     */
    private $js;
    /**
     * @var array
     */
    private $css;
    /**
     * @var string View page title
     */
    private $pageTitle;
    /**
     * @var array
     */
    private $meta;
	/**
	 * View constructor.
	 */
	public function __construct()
	{
	    $this->js=array();
	    $this->css=array();
	    $this->meta=array();

	    //Default page title
        $this->pageTitle = PAGE_TITLE;
	}

	public function render($name,bool $noInclude=false)
	{
	    if ($noInclude){
            require ROOT."views/".$name.".php";
        }
        else {
            require ROOT."views/".HEADER_FILE;
            require ROOT."views/".$name.".php";
            require ROOT."views/".FOOTER_FILE;
        }

	}
	public function addJSFile($filePath){
        array_push($this->js,$filePath);
    }

    public function addCSSFile($filePath)
    {
        array_push($this->css,$filePath);
    }
    public function addMetaTag($metaname,$content)
    {
        array_push($this->meta,array($metaname,$content));
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle(string $pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }
}