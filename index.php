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

// initialize trip and add transport
$trip = new Trip();
$trip->addTransport(
    new Plane(), [
        'ticketPrice' => 25000,
        'capacity' => 120,
        'companyName' => 'S7',
        'numberOfMotors' => 4
    ]
);
$trip->addTransport(
    new Plane(), [
        'ticketPrice' => 17200,
        'capacity' => 80,
        'companyName' => 'Air Astana',
        'numberOfMotors' => 2
    ]
);
$trip->addTransport(
    new Bus(), [
        'ticketPrice' => 1670,
        'capacity' => 36,
        'path' => 'To Karagandy',
        'carNumber' => '286AAA01'
    ]
);
$trip->addTransport(
    new Tram(), [
        'ticketPrice' => 15,
        'capacity' => 32,
        'listOfStops' => ['Lenina street', 'Kirova street'],
        'numberOfCarriages' => 1
    ]
);

// show off lab info
echo 'Lab 4: Transport<br>';
echo '<br>Total price: <b>' . $trip->countTotalPrice() . '</b>';

// dump transport
echo '<pre>';
print_r($trip->getListOfTransport());
echo '</pre>';
