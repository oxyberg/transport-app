<?php

require 'app.php';

$x = array_rand(Map::getAdj());
$y = array_rand(Map::getAdj());
if ($y == $x) $y = array_rand(Map::getAdj());

$cheap = true;

$trip = new Trip();
$path = $trip->buildRoute($x, $y);
$vehicles = $trip->assignTransport($path, $cheap);

echo 'Route from [' . $x . '] to [' . $y . '] <br />';
if ($cheap) echo 'Found the cheapest path with total price <b>[' . $trip->calcTotal() . ']</b><br />';
else echo 'Found the most comfortable (with higher price) path with total price <b>[' . $trip->calcTotal() . ']</b><br />';

echo '<pre>';
print_r($vehicles);
echo '</pre>';
