<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

require_once 'TimeInterval.php';

// This class is to help allow spread time intervals.
class MultiTimeInterval {

	function __construct() {
		$this->timeIntervalArray = array();
	}

	public function addInterval( $timeInterval ) {
		$this->timeIntervalArray[] = $timeInterval;
		$this->normalizeTimeIntervals(); // to automatically prevent overlaps.
	}

	public function getCountOfTimeOfIntervals() {
		return count( $this->timeIntervalArray );
	}

	public function getTimeInterval( $index ) {
		$timeInterval = null;

		$count = count( $this->timeIntervalArray );

		if ($index < $count) {
			$timeInterval = $this->timeIntervalArray[ $index ]; 
		} else {
			echo "Fatal error: Tried to access index out of bound. Exiting...";
			die();
		}

		return $timeInterval;
	}

	public function getTimeIntervals() {
		return $this->timeIntervalArray;
	}

	public function printObject() {
		$countOfIntervals = $this->getCountOfTimeOfIntervals();
		echo "<br><b>Printing MultiTimeInterval (count: $countOfIntervals)</b><h><br>";

		$count = 1;
		foreach ($this->timeIntervalArray as $timeInterval) {
			echo $count . "<br>";

			$timeInterval->printObject();

			$count++;
		}

		echo "<br><h>";
	}

	/**
	 * A List (array) of time intervals for a day.
	 * @var array [TimeInterval]
	 */
	private $timeIntervalArray;

	/**
	 * Find overlapping time intervals and normalize them.
	 */
	private function normalizeTimeIntervals() {
		// NOTE: Gotta code this.
	}
}

?>