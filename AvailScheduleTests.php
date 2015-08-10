<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

require_once 'AvailSchedule.php';

// TESTING BEGINS
echo "TESTING AvailSchedule CLASS <br><br>";

// A: AvailSchedule for a Department (Single, Long Interval)
echo "A: AvailSchedule for a Department (Single, Long Interval)";

// 1. Default Constructor.
$availability = new AvailSchedule();

// 2. Now set values.

// Create some times intervals.
$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

$weekdaysTimeInterval->printObject();

// Set the time periods.
$availability->setAvailableTimeInterval( DaysOfWeek::Monday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Tuesday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Wednesday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Thursday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Friday, $fridayTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Saturday, $saturdayTimeInterval );

// 3. Print
$availability->printObject();

// B: AvailSchedule for an Instructor (Multi, Short Interval)
echo "A: AvailSchedule for a Department (Single, Long Interval)";

// 1. Default Constructor.
$availability = new AvailSchedule();

// 2. Now set values.

// Create some times intervals.
$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

$weekdaysTimeInterval->printObject();

// Set the time periods.
$availability->setAvailableTimeInterval( DaysOfWeek::Monday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Tuesday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Wednesday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Thursday, $weekdaysTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Friday, $fridayTimeInterval );
$availability->setAvailableTimeInterval( DaysOfWeek::Saturday, $saturdayTimeInterval );

// 3. Print
$availability->printObject();

?>