<?php

// set to true to view all the pretty errors
define(DEBUG, true);
if (debug)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

// create custom class autoloader
spl_autoload_register(function ($class) {
    include 'lib/' . $class . '.php';
});