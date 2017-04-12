<?php

require 'app.php';

$route = new Route();
$route->loadRoutes('map.json');

echo '<pre>';
print_r($route->buildRoute('b', 'g'));
echo '</pre>';
