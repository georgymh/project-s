<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDES
require '../Department.php';
require '../Room.php';


// TESTING BEGINS
echo "TESTING Department and Room CLASSES Integration <br><br>";

// 1. Create department with days and hours.
echo "First step, create a department with days and hours.";

// Create department.
$clarkCompCenter = Department::create()->withName('Clark Computing Center');

// Create and assign days.
$daysOpened = [
	DaysOfWeek::Monday 		=> TRUE,
	DaysOfWeek::Tuesday 	=> TRUE,
	DaysOfWeek::Wednesday 	=> TRUE,
	DaysOfWeek::Thursday 	=> TRUE,
	DaysOfWeek::Friday 		=> TRUE,
	DaysOfWeek::Saturday 	=> TRUE,
	DaysOfWeek::Sunday 		=> FALSE
];

$clarkCompCenter->setDaysOpened($daysOpened);

// Create and assign hours.
$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

$hoursOpened = [
	DaysOfWeek::Monday 		=> $weekdaysTimeInterval,
	DaysOfWeek::Tuesday 	=> $weekdaysTimeInterval,
	DaysOfWeek::Wednesday 	=> $weekdaysTimeInterval,
	DaysOfWeek::Thursday 	=> $weekdaysTimeInterval,
	DaysOfWeek::Friday 		=> $fridayTimeInterval,
	DaysOfWeek::Saturday 	=> $saturdayTimeInterval
];

$clarkCompCenter->setHoursOpened($hoursOpened);

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

echo "<hr><b>Room list:</b> <br>";
print_r ( $clarkCompCenter->getListOfRooms() );
echo "<br> <b> The list has " . $clarkCompCenter->getListOfRooms()->count() . " room objects.<b><br><br><br>";
?>