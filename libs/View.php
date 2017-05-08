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
     * Array for Javascript files
     * @var array
     */
    private $js;

    /**
     * Array for CSS files
     * @var array
     */
    private $css;

    /**
     * This is page title fr View
     * @var string
     */
    private $pageTitle;

    /**
     * Array for Meta tags
     * @var array
     */
    private $meta;

    /**
     * Set default Page title from config.php and generate array variables
     * View constructor.
     */
    public function __construct()
    {
        $this->js = array();
        $this->css = array();
        $this->meta = array();
        //Default page title
        $this->pageTitle = PAGE_TITLE;
    }

    /**
     * Render page from the View folder
     * @param string $name
     * @param bool $noInclude
     */
    public function render($name, bool $noInclude = false)
    {
        if ($noInclude) {
            require ROOT . VIEWS . $name . ".php";
        } else {
            require ROOT . VIEWS . HEADER_FILE;
            require ROOT . VIEWS . $name . ".php";
            require ROOT . VIEWS . FOOTER_FILE;
        }

    }

    /**
     * Add new Javascript file for View
     * @param string $filePath
     */
    public function addJSFile($filePath)
    {
        array_push($this->js, $filePath);
    }

    /**
     * Add new CSS File for View
     * @param string $filePath
     */
    public function addCSSFile($filePath)
    {
        array_push($this->css, $filePath);
    }

    /**
     * Add new Meta tag for View
     * @param string $metaname
     * @param string $content
     */
    public function addMetaTag($metaname, $content)
    {
        array_push($this->meta, array($metaname, $content));
    }

    /**
     * This function set the View page Title name
     * @param string $pageTitle
     */
    public function setPageTitle(string $pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }
}