<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $this->pageTitle?></title>

    <script type="text/javascript" src="<?php echo URL?>public/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo URL?>public/js/default.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo URL?>public/css/default.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo URL?>public/css/bootstrap.min.css"/>
    <?php
    if (isset($this->meta) && count($this->meta)>0){
        foreach ($this->meta as $m) {
            echo '<meta name="'.$m[0].'" content="'.$m[1].'">';
        }
    }

    if (isset($this->js) && count($this->js)>0){
        foreach ($this->js as $j) {
            echo '<script src="'.URL.'views/'.$j.'"></script>';
        }
    }

    if (isset($this->css) && count($this->css)>0){
        foreach ($this->css as $css) {
            echo '<link rel="stylesheet" type="text/css" href="'.URL.'views/'.$css.'"/>';
        }
    }
    ?>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo URL?>index/">Document</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL?>index/">Index</a></li>
                <li><a href="<?php echo URL?>about/">About</a></li>
            </ul>
        </div>
    </div>

</nav>
<div class="container">
