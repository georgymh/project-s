<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDES
require '../Department.php';
require '../Room.php';


// TESTING BEGINS
echo "TESTING Department and Room CLASS Integration <br><br>";

// 1. Create department with days and hours.
echo "First step, create a department with days and hours.";

$clarkCompCenter = new Department();
$clarkCompCenter->setName('Clark Computing Center');

$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Monday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Tuesday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Wednesday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Thursday, $weekdaysTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Friday, $fridayTimeInterval );
$clarkCompCenter->addOperationDayAndTime( DaysOfWeek::Saturday, $saturdayTimeInterval );

// Print Department.
$clarkCompCenter->printObject();

// 2. Create 4 rooms and assign to the Department.
echo "Second step, create 4 rooms and assign them to the Department.<br>";

$cc101 = Room::create()->withPrefix("CC")->withRoomNumber(101);
$clarkCompCenter->addRoom( $cc101 );

$cc102 = Room::create()->withPrefix("CC")->withRoomNumber(102);
$clarkCompCenter->addRoom($cc102);

$cc103 = Room::create()->withPrefix("CC")->withRoomNumber(103);
$clarkCompCenter->addRoom($cc103);

$cc105 = Room::create()->withPrefix("CC")->withRoomNumber(105);
$clarkCompCenter->addRoom($cc105);

$clarkCompCenter->printObject();
?>