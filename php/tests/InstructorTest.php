<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDES
require_once '../Instructor.php';
require_once '../AvailSchedule.php';

// SOME SETUPS:
	// InstructorAvailSchedule #1
	$availableSchedule = new InstructorAvailSchedule();
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::LateMorningAndAfternoon );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::LateMorningAndAfternoon );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::Evening );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::LateMorningAndAfternoon );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Evening );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Night );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::Night );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::LateMorningAndAfternoon );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Friday, TimePeriod::Night );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::EarlyMorning );
	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Saturday, TimePeriod::Evening );

	$availableSchedule->setAvailableTimePeriod( DaysOfWeek::Sunday, TimePeriod::LateMorningAndAfternoon );

	// InstructorAvailSchedule # 2
	$anotherSchedule = new InstructorAvailSchedule();
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::EarlyMorning );
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Monday, TimePeriod::LateMorningAndAfternoon );

	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::LateMorningAndAfternoon );
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Tuesday, TimePeriod::Evening );

	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::EarlyMorning );
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Evening );
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Wednesday, TimePeriod::Night );

	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::EarlyMorning );
	$anotherSchedule->setAvailableTimePeriod( DaysOfWeek::Thursday, TimePeriod::Night );

// TESTING BEGINS
echo "<h1>TESTING INSTRUCTOR CLASS</h1><br><br>";

// A: Default Constructor
echo '<h2>A: Default constructor</h2>';
// 1. Default Constructor.
$instructorA = new Instructor();

// 2. Print (empty)
echo "<h3>- Printing empty:</h3>";
$instructorA->printObject();

// 3. Now set values.
$instructorA->setName('Mrs. Anna Wall');
$instructorA->setAvailSchedule($availableSchedule);

// 4. Print object
echo "<h3>- Printing with data:</h3>";
$instructorA->printObject();

// B: Overloaded Constructor
echo '<h2>B: Overloaded constructor</h2>';
// 1. Overloaded Constructor.
$instructorB = Instructor::create()->withName("Mr. John Doe")->withSchedule($availableSchedule);

// 2. Print object
echo "<h3>- Printing with data:</h3>";
$instructorB->printObject();

// 3. Now change values.
$instructorB->setName('Mr. Johnny');
$instructorB->setAvailSchedule($anotherSchedule);

// 4. Print object
echo "<h3>- Printing with less data:</h3>";
$instructorB->printObject();

// 5. Unset schedule (should result on error)
echo "<h3>- Set schedule to 'null' -- expecting error:</h3>";
$instructorB->setAvailSchedule(null);
$instructorB->printObject();

?>