<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

require_once 'HelperClasses.php';

/**
* Enum type (abstact class in PHP) "DaysOfWeek" that contains the 7 days 
* of the week.
*
* Note: I'm not using the new SplEnum (http://php.net/manual/en/class.splenum.php)
* because it requires you to initialize the class in order to use it. I find
* this one to emulate the C++ Enum types better.
*
* Usage:
*
* $today = DaysOfWeek::Sunday;				
*
*/
abstract class DaysOfWeek extends BasicEnum {
    const Monday = 0;
    const Tuesday = 1;
    const Wednesday = 2;
    const Thursday = 3;
    const Friday = 4;
    const Saturday = 5;
    const Sunday = 6;
}

/*
* Convenience array with every day of the week.
*/
$arrayOfDays = [	
	DaysOfWeek::Monday,
	DaysOfWeek::Tuesday,
	DaysOfWeek::Wednesday,
	DaysOfWeek::Thursday,
	DaysOfWeek::Friday,
	DaysOfWeek::Saturday,
	DaysOfWeek::Sunday
	];

// Helper method.

function isValidDay($day) {
    return DaysOfWeek::isValidValue($day);
}

// TESTING CASES
/*
DaysOfWeek::isValidName('Humpday');                  // false
DaysOfWeek::isValidName('Monday');                   // true
DaysOfWeek::isValidName('monday');                   // true
DaysOfWeek::isValidName('monday', $strict = true);   // false
DaysOfWeek::isValidName(0);                          // false

DaysOfWeek::isValidValue(0);                         // true
DaysOfWeek::isValidValue(5);                         // true
DaysOfWeek::isValidValue(7);                         // false
DaysOfWeek::isValidValue('Friday');                  // false
*/

?>