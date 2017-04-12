<?php

require 'app.php';

$route = new Route();
$route->loadRoutes('map.json');

echo '<pre>';
print_r($route->adj);
echo '</pre>';
