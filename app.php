<?php

define('DEBUG', true); // set to true to view all the pretty errors
define('ROOT', dirname(__FILE__)); // app root path

if (DEBUG)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

// init autoloader
require ROOT . '/core/Autoload.php';
Autoload::directories([
    ROOT . '/core',
    ROOT . '/lib',
]);
Autoload::register();

// load available routes, countries and transport paths
Map::load('map.json');

$snatch = new Snatch;

// routes
$snatch->get('/', function()
{
    $cities = Map::getAdj();
	require ROOT . '/views/welcome.php';
});
$snatch->post('/', function()
{
    $cities = Map::getAdj();
    $data = $_POST;
	require ROOT . '/views/result.php';
});
$snatch->missing(function()
{
	echo '404 error!';
});
