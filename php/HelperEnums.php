<?php

/*
	Georgy Marrero.
	August 9, 2015.
*/

require_once 'TimeInterval.php';
require_once 'HelperClasses.php';

/**
 * Time Period
 */
abstract class TimePeriod extends BasicEnum {
    const EarlyMorning = 0; 			// 7AM to 10AM (before 10AM)
    const LateMorningAndAfternoon = 1; 	// 10AM to 2PM 
    const Evening = 2;					// 2PM to 6PM
    const Night = 3;					// 6PM to 10:30PM (after 6PM)
}

// Helper methods.

function isValidTimePeriod( $timePeriod ) {
	return TimePeriod::isValidValue($timePeriod);
}

function getIntervalFromPeriod( $timePeriod ) {
	$interval = null;

	switch ($timePeriod) {
		case TimePeriod::EarlyMorning:
			$interval = TimeInterval::create()->withStart(DEFAULT_EARLY_BOUND)->withEnd('10 AM');
		break;
		case TimePeriod::LateMorningAndAfternoon:
			$interval = TimeInterval::create()->withStart('10 AM')->withEnd('2 PM');
		break;
		case TimePeriod::Evening:
			$interval = TimeInterval::create()->withStart('2 PM')->withEnd('6 PM');
		break;
		case TimePeriod::Night:
			$interval = TimeInterval::create()->withStart('6PM')->withEnd(DEFAULT_LATE_BOUND);
		break;
		default:
			echo "ERROR: Default case on getIntervalFromPeriod() -- fix ASAP!";
	}

	return $interval;
}

define("DEFAULT_EARLY_BOUND", '7 AM');

define("DEFAULT_LATE_BOUND", '11 PM');

?>