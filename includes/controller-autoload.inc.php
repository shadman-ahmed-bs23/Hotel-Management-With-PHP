<?php

spl_autoload_register("controller_autoload");

function controller_autoload($className)
{
    $path = './../controllers/';
    $extension = '.php';
    $fileName = $path . $className . $extension;

    if (!file_exists($fileName)) {
        return false;
    }

    include_once $fileName;
}