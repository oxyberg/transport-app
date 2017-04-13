<?php

require 'app.php';

$trip = new Trip();
$path = $trip->buildRoute('a', 'g');
$vehicles = $trip->assignTransport($path, true);

echo '<pre>';
print_r($vehicles);
echo '</pre>';
