<?php 

/*
	Georgy Marrero.
	August 10, 2015.
*/

// INCLUDES
require_once 'Instructor.php';
require_once 'AvailSchedule.php';
require_once 'CollegeClass.php';

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
echo "<h1>TESTING Instructor with CollegeClass CLASS</h1><br><br>";

// A: Default Constructor
echo '<h2>A: Default constructor</h2>';
// 1. Default Constructor.
$instructorA = new Instructor();

// 2. Now set values.
$instructorA->setName('Mrs. Anna Wall');

$instructorA->setAvailSchedule($availableSchedule);

$history = new CollegeClass();
$history->setTitle('History 180');
$history->setCredits(CollegeClassCredits::Three);
$history->setWeeklyFrequency(CollegeClassWeeklyFrequency::TwicePerWeek);
$history->setPeriod(CollegeClassSemestrialPeriod::FullSemester);
$instructorA->addClass($history);

// 3. Print object
$instructorA->printObject();

// B: Overloaded Constructor
echo '<h2>B: Overloaded constructor</h2>';
// 1. Overloaded Constructor.
$instructorB = Instructor::create()->withName("Mr. John Doe")->withSchedule($anotherSchedule);

// 2. Add classes.
$math = new CollegeClass();
$math->setTitle('Math 180');
$math->setCredits(CollegeClassCredits::Four);
$math->setWeeklyFrequency(CollegeClassWeeklyFrequency::MondayToThursday);
$math->setPeriod(CollegeClassSemestrialPeriod::FullSemester);
$instructorB->addClass($math);

$anotherMath = new CollegeClass();
$anotherMath->setTitle('Math 185');
$anotherMath->setCredits(CollegeClassCredits::Four);
$anotherMath->setWeeklyFrequency(CollegeClassWeeklyFrequency::ThricePerWeek);
$anotherMath->setPeriod(CollegeClassSemestrialPeriod::FullSemester);
$instructorB->addClass($anotherMath);

$yetAnotherMath = new CollegeClass();
$yetAnotherMath->setTitle('Math 280');
$yetAnotherMath->setCredits(CollegeClassCredits::Four);
$yetAnotherMath->setWeeklyFrequency(CollegeClassWeeklyFrequency::TwicePerWeek);
$yetAnotherMath->setPeriod(CollegeClassSemestrialPeriod::FullSemester);
$instructorB->addClass($yetAnotherMath);

// 3. Print object
$instructorB->printObject();

?>