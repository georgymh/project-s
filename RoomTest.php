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

// 1. Default Constructor before Static Variables
echo "1. Default Constructor (empty) [before static variables]<br>";
$cc100 = new Room();
$cc100->printObject();

// Static Variables
Room::setDepartmentName("Clark Computing Center");

Room::setDaysOpened([
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> TRUE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> TRUE,
	DaysOfWeek::Sunday 		=> TRUE
	]);

Room::setHoursOpened([
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> TRUE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> TRUE,
	DaysOfWeek::Sunday 		=> TRUE
	]);

// 2. Default Constructor after Static Variables
echo "2. Default Constructor (empty) [after static variables]<br>";
$cc101 = new Room();
$cc101->printObject();

// 3. Overloaded Constructor Hack
echo "3. Overloaded Constructor Hack (\"CC\", 102)";
$cc102 = Room::create()->withPrefix("CC")->withRoomNumber(102);
$cc102->printObject();

// 4. Default Constructor and then set values
echo "4. Default Constructor and then set values";
$cc103 = new Room();
$cc103->setPrefix("CC");
$cc103->setRoomNumber(103);
$cc103->printObject();

// 5. Overloaded Constructor ("BE", 888) then set values to CC 104 
echo "5. Overloaded Constructor (\"BE\", 888) then set values to CC 104";
$cc104 = new Room("BE", 888);
$cc104->setPrefix("CC");
$cc104->setRoomNumber(104);
$cc104->printObject();

// 6. Overloaded Constructor ("BE", 106) then change static variables
echo "6. Overloaded Constructor (\"BE\", 106) then change static variables";
$be106 = Room::create()->withPrefix("BE")->withRoomNumber(106);

// Changing Static Variables
Room::setDepartmentName("Business Education");

Room::setDaysOpened([
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> FALSE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> FALSE,
	DaysOfWeek::Sunday 		=> FALSE
	]);

Room::setHoursOpened([
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> FALSE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> FALSE,
	DaysOfWeek::Sunday 		=> FALSE
	]);

$be106->printObject();

// 6.5 Previous Room after changing Static Variables
$cc104->printObject();

?>