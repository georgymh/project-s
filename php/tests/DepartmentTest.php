<?php

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDE
require '../Department.php';

// TESTING BEGINS

// 1. Empty Object
echo "1. Empty Object";
$noNameDepartment = new Department();
$noNameDepartment->printObject();

// 2. Default Constructor (Clark Computing Center)
echo "2. Default Constructor ('Clark Computing Center')";
$clarkCompCenter = new Department();
$clarkCompCenter->setName('Clark Computing Center');
$clarkCompCenter->printObject();

// 3. Assign schedule of operation.
echo "3. Assign schedule of operation.";

$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Monday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Tuesday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Wednesday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Thursday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Friday, $fridayTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Saturday, $saturdayTimeInterval );

$clarkCompCenter->printObject();

?>