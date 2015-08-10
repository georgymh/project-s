<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDES
require_once 'Instructor.php';

// TESTING BEGINS
echo "TESTING INSTRUCTOR CLASS <br><br>";

// 1. Default Constructor.
$instructorA = new Instructor();

// 2. Now set values.


// 3. Overloaded Constructor.
$instructorB = Instructor::create()->withName("Mr. John Doe");

// 4. Now change values.


?>