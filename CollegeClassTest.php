<?php

/*
	Georgy Marrero.
	August 10, 2015.
*/

require_once 'CollegeClass.php';

// TESTING BEGINS
echo "<h1>TESTING CollegeClass CLASS</h1><br><br>";

// A: Default Constructor
echo '<h2>A: Default constructor</h2>';
$history = new CollegeClass();

echo '<h3>Printing empty:</h3>';
$history->printObject();

$history->setTitle('History 180');
$history->setCredits(CollegeClassCredits::Three);
$history->setWeeklyFrequency(CollegeClassWeeklyFrequency::TwicePerWeek);
$history->setPeriod(CollegeClassSemestrialPeriod::FullSemester);

echo '<h3>Printing with data:</h3>';
$history->printObject();

?>