<?php

require 'app.php';

$route = new Route();
$route->loadRoutes('routes.json');

echo '<pre>';
print_r($route->adj);
echo '</pre>';
