<?php

require 'app.php';

$route = new Route();
$route->loadRoutes('map.json');

echo '<pre>';
print_r($route->convertVertices($route->adj, 'num'));
echo '</pre>';
