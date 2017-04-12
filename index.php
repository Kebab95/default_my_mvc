<?php
define("ROOT", __DIR__ . DIRECTORY_SEPARATOR);

require "config.php";

/**
 * Auto load classes
 * @param $class
 */
function __autoload($class)
{
    require LIBS . $class . ".php";
}

$app = new Bootstrap();