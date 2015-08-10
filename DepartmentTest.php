<?php

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDE
require 'Department.php';

// TESTING BEGINS

// 1. Default Constructor
echo "1. Default Constructor";
$noNameDepartment = new Department();
$noNameDepartment->printObject();

// 2. Overloaded Constructor ('Clark Computing Center')
echo "2. Overloaded Constructor ('Clark Computing Center')";
$clarkCompCenter = Department::create()->withName('Clark Computing Center');
$clarkCompCenter->printObject();

// 3. Assign days opened and hours of operation.
echo "3. Assign days opened and hours of operation.";
$clarkCompCenter->setDaysOpened([
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> TRUE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> TRUE,
	DaysOfWeek::Sunday 		=> TRUE
	]);

$clarkCompCenter->setHoursOpened([	  // Not exactly.
	DaysOfWeek::Monday 		=> TRUE,  // Should use TimeInterval
	DaysOfWeek::Tuesday 	=> TRUE,  // instead of boolean for
	DaysOfWeek::Wednesday 	=> TRUE,  // te key.
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> TRUE,
	DaysOfWeek::Sunday 		=> TRUE
	]);

$clarkCompCenter->printObject();

// 4. Overloaded Constructor ( withName()->withDaysOpened()->withHoursOpened() )
echo "4. Overloaded Constructor ( withName()->withDaysOpened()->withHoursOpened() )";
$businessEd = Department::create()->withName('Business Education')
	->withDaysOpened($clarkCompCenter->getDaysOpened())
	->withHoursOpened($clarkCompCenter->getHoursOpened());

$businessEd->printObject();

?>