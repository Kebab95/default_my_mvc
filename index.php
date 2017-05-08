<?php
define("ROOT", __DIR__ . DIRECTORY_SEPARATOR);

require "config.php";

/**
 * Auto load classes
 * @param $class
 */
function __autoload($class)
{
    if (file_exists(LIBS.$class.".php")){
        require LIBS . $class . ".php";
    }

    if (file_exists(DBCLASSES.$class.".php")){
        require DBCLASSES . $class . ".php";
    }
}
$app = new Bootstrap();
