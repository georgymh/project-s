<?php

require_once 'HelperEnums.php';
require_once 'MultiTimeInterval.php';

$earlyMorning = getIntervalFromPeriod(TimePeriod::EarlyMorning);
$lateMorning = getIntervalFromPeriod(TimePeriod::LateMorningAndAfternoon);
$evening = getIntervalFromPeriod(TimePeriod::Evening);
$night = getIntervalFromPeriod(TimePeriod::Night);

echo "1. Single Time Period / Interval<br>";
$instructorTimePreference = new MultiTimeInterval();

$instructorTimePreference->addInterval($earlyMorning);

$itpCount = $instructorTimePreference->getCountOfTimeOfIntervals();

if ( $itpCount > 1 ) {
	$timeIntervalArray = $instructorTimePreference->getTimeIntervals();

	$count = 1;
	foreach ($timeIntervalArray as $timeInterval) {
		echo "<b>" . $count++ . "</b>";
		$timeInterval->printObject();
	}

} else {
	$instructorTimePreference->getTimeInterval(0)->printObject();
}


echo "2. Multiple Time Periods / Intervals<br>";
$instructorTimePreference2 = new MultiTimeInterval();

$instructorTimePreference2->addInterval($earlyMorning);
$instructorTimePreference2->addInterval($lateMorning);
$instructorTimePreference2->addInterval($night);

$itpCount = $instructorTimePreference2->getCountOfTimeOfIntervals();

if ( $itpCount > 1 ) {
	$timeIntervalArray = $instructorTimePreference2->getTimeIntervals();

	$count = 1;
	foreach ($timeIntervalArray as $timeInterval) {
		echo "<b>" . $count++ . "</b>";
		$timeInterval->printObject();
	}

} else {
	$instructorTimePreference2->getTimeInterval(0)->printObject();
}

?> 