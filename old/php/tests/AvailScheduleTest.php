<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

require_once '../AvailSchedule.php';
require_once '../HelperEnums.php';

// TESTING BEGINS
echo "<h1>TESTING AvailSchedule CLASS and SUBCLASSES</h1>";

// A: AvailSchedule for a Department (Single, Long Interval)
echo "<h2>A: DepartmentAvailSchedule -- using setAvailableTimeInterval()</h2>";

// 1. Default Constructor.
$deptAvailability = new DepartmentAvailSchedule();

// 2. Now set values.

// Create some times intervals.
$weekdaysTimeInterval = TimeInterval::create()->withStart("7:30 AM")->withEnd("10:30 PM");
$fridayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("6 PM");
$saturdayTimeInterval = TimeInterval::create()->withStart("9 AM")->withEnd("3 PM");

// Set the time periods.
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Monday, $weekdaysTimeInterval );
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Tuesday, $weekdaysTimeInterval );
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Wednesday, $weekdaysTimeInterval );
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Thursday, $weekdaysTimeInterval );
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Friday, $fridayTimeInterval );
$deptAvailability->setAvailableTimeInterval( DaysOfWeek::Saturday, $saturdayTimeInterval );

// 3. Print
$deptAvailability->printObject();

// B: AvailSchedule for an Instructor -- using setAvailableTimePeriod()
echo "<h2>B: InstructorAvailSchedule -- using setAvailableTimePeriod()</h2>";

// B1: Only one time period, no early-late bounds set -- default state.
echo "<h3>B1: Only one time period, no early-late bounds set -- default state</h3>";
$oneTimePeriodNoBounds = new InstructorAvailSchedule();

$oneTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::EarlyMorning );

$oneTimePeriodNoBounds->printObject();

// B2: Only one time period, with early-late bounds set -- calling setEarlyAndLateTimeBounds()
echo "<h3>B2: Only one time period, with early-late bounds set -- calling setEarlyAndLateTimeBounds()</h3>";
$oneTimePeriodYesBounds = new InstructorAvailSchedule();

$oneTimePeriodYesBounds->setEarlyAndLateTimeBoundsFromDepartmentSchedule($deptAvailability);

$oneTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::EarlyMorning );
echo "Note: Friday start should be 9:00 AM instead of the default 7:00 AM that B1 showed.<br>";

$oneTimePeriodYesBounds->printObject();


// B3: Multiple time periods, no early-late bounds set -- default state.
echo "<h3>B3: Multiple time periods, no early-late bounds set -- default state</h3>";
$multiTimePeriodNoBounds = new InstructorAvailSchedule();

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::LateMorningAndAfternoon );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::Evening );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Evening );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Night );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::Night );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::Night );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::EarlyMorning );
$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::Evening );

$multiTimePeriodNoBounds->setAvailableTimePeriod( DaysOfWeek::Sunday, TimePeriod::LateMorningAndAfternoon );

$multiTimePeriodNoBounds->printObject();


// B4: Multiple (and spread) time periods, with early-late bounds set  -- calling setEarlyAndLateTimeBounds()
echo "<h3>B4: Multiple (and spread) time periods, with early-late bounds set  -- calling setEarlyAndLateTimeBounds()
</h3>";
$multiTimePeriodYesBounds = new InstructorAvailSchedule();

$multiTimePeriodYesBounds->setEarlyAndLateTimeBoundsFromDepartmentSchedule($deptAvailability);

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::LateMorningAndAfternoon );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::Evening );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Evening );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Night );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::Night );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::LateMorningAndAfternoon );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::Night );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::EarlyMorning );
$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::Evening );

$multiTimePeriodYesBounds->setAvailableTimePeriod( DaysOfWeek::Sunday, TimePeriod::LateMorningAndAfternoon );

$multiTimePeriodYesBounds->printObject();

?>