<?php

require 'app.php';

$trip = new Trip();

echo '<pre>';
print_r($trip->findVehicle('a', 'b'));
echo '</pre>';
