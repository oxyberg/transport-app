<?php

require 'app.php';

$trip = new Trip();
$available = $trip->findVehicle('a', 'j');
echo '<pre>';
print_r($available);
echo '</pre>';
