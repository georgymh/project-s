<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

/* COMPOSER
require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Los_Angeles');

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

//$log->addWarning('Foo');
*/

// INCLUDES
require 'Room.php';

// TESTING BEGINS
echo "TESTING ROOM CLASS <br><br>";

// 1. Default Constructor
echo "1. Default Constructor (empty) <br>";
$cc100 = new Room();
$cc100->printObject();

// 2. Overloaded Constructor Hack
echo "2. Overloaded Constructor Hack (\"CC\", 102)";
$cc102 = Room::create()->withPrefix("CC")->withRoomNumber(102);
$cc102->printObject();

// 3. Default Constructor and then set values
echo "3. Default Constructor and then set values";
$cc103 = new Room();
$cc103->setPrefix("CC");
$cc103->setRoomNumber(103);
$cc103->printObject();

// 4. Overloaded Constructor ("BE", 888) then set values to CC 104 
echo "4. Overloaded Constructor (\"BE\", 888) then set values to CC 104";
$cc104 = new Room("BE", 888);
$cc104->setPrefix("CC");
$cc104->setRoomNumber(104);
$cc104->printObject();

?>