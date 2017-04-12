<?php
define("ROOT",__DIR__.DIRECTORY_SEPARATOR);

require "config.php";

function __autoload($class){
    require "libs/".$class.".php";
}

$app = new Bootstrap();