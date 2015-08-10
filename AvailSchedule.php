<?php 

/*
	Georgy Marrero.
	August 9, 2015.
*/

// INCLUDES
require_once 'DaysOfWeek.php';
require_once 'MultiTimeInterval.php';

class AvailSchedule {
// PUBLIC:

	// Default Constructor
	function __construct() {
		$this->daysAvailability = [
			DaysOfWeek::Monday 		=> FALSE,
			DaysOfWeek::Tuesday 	=> FALSE,
			DaysOfWeek::Wednesday 	=> FALSE,
			DaysOfWeek::Thursday 	=> FALSE,
			DaysOfWeek::Friday 		=> FALSE,
			DaysOfWeek::Saturday 	=> FALSE,
			DaysOfWeek::Sunday 		=> FALSE
		];

		$this->hoursAvailability = [
			DaysOfWeek::Monday 		=> new MultiTimeInterval(),
			DaysOfWeek::Tuesday 	=> new MultiTimeInterval(),
			DaysOfWeek::Wednesday 	=> new MultiTimeInterval(),
			DaysOfWeek::Thursday 	=> new MultiTimeInterval(),
			DaysOfWeek::Friday 		=> new MultiTimeInterval(),
			DaysOfWeek::Saturday 	=> new MultiTimeInterval(),
			DaysOfWeek::Sunday 		=> new MultiTimeInterval()
		];

		$this->earlyAndLateTimeBoundsActivated = false; // false by default.
		$this->earlyAndLateBounds = TimeInterval::create(); // empty by default.
	}

	// Getters

	/**
	 * Returns the available days.
	 * @return array [DaysOfWeek]
	 */
	public function getAvailableDays() {
		$daysAvailable = array();

		$days = $this->daysAvailability;

		if (is_array($days) || is_object($days)) {
			foreach ($days as $day => $isAvailable) {
				if ($isAvailable) {
					$daysAvailable[] = $day;
				}
			}
		}

		return $daysAvailable;
	}

	/**
	 * Returns the unavailable days.
	 * @return array [DaysOfWeek]
	 */
	public function getUnavailableDays() {
		$daysUnavailable = array();

		$days = $this->daysAvailability;

		if (is_array($days) || is_object($days)) {
			foreach ($this->daysAvailability as $day => $isAvailable) {
				if (!$isAvailable)
					$daysUnavailable[] = $day;
			}
		}

		return $daysUnavailable;
	}
	/**
	 * Returns the hours of availability of a specific day.
	 * @param  DaysOfWeek $day 
	 * @return MultiInterval
	 */
	public function getHoursOfDay( $day ) {

		if ( !isValidDay($day) ) {
			echo "Error: Day $day is not valid.<br>";
			exit();
		}

		return $this->hoursAvailability[$day]; // return anyways.
	}

	// Setters

	/**
	 * Adds a Time Period as an availabilitiy for a day.
	 * @param DaysOfWeek $day       
	 * @param TimePeriod $timePeriod 
	 */
	public function setAvailableTimePeriod( $day, $timePeriod ) {
		if ( isValidDay($day) ) {
			if ( isValidTimePeriod($timePeriod) ) {

				switch ($timePeriod) {
				case TimePeriod::EarlyMorning:
					if ($this->earlyAndLateTimeBoundsActivated) {
						$newInterval = getIntervalFromPeriod($timePeriod);
						$newInterval->setStart( $earlyAndLateBounds->getStart() );
					} else {
						// Default bounds.
						$newInterval = getIntervalFromPeriod($timePeriod);
					}
				break;
				case TimePeriod::LateMorningAndAfternoon:
					$newInterval = $timePeriodMeaningInTimeInterval[$timePeriod];
				break;
				case TimePeriod::Evening:
					$newInterval = $timePeriodMeaningInTimeInterval[$timePeriod];
				break;
				case TimePeriod::Night:
					if ($this->earlyAndLateTimeBoundsActivated) {
						$newInterval = getIntervalFromPeriod($timePeriod);
						$newInterval->setEnd( $earlyAndLateBounds->getEnd() );
					} else {
						// Default bounds.
						$newInterval = getIntervalFromPeriod($timePeriod);
					}
				break;
				default:
					echo "ERROR: default value on AvailSchedule::setAvailableTimePeriod() -- fix ASAP!";
				}

				$this->daysAvailability[$day] = true;
				$this->hoursAvailable[$day] = $newInterval; // success.
			} else {
				echo "Error: Time Period $timePeriod is not valid.";
				exit();
			}
			
		} else {
			echo "Error: Day $day is not valid.<br>";
			exit();
		}
	}

	/**
	 * Adds a specific time period as an availability on a day.
	 * 
	 * @param DaysOfWeek $day    
	 * @param TimeInterval $timeInterval
	 */
	public function setAvailableTimeInterval( $day, $timeInterval ) {
		if ( isValidDay($day) ) {
			$this->daysAvailability[$day] = true;
			$this->hoursAvailability[$day]->addInterval( $timeInterval );
		}
	}

	/**
	 * Sets the early and late time bounds for the first and last time periods.
	 * @param string $earlyBound string of time (example: 5:30 pm)
	 * @param string $lateBound  string of time (example: 8am)
	 */
	public function setEarlyAndLateTimeBounds( $earlyBound, $lateBound ) {
		$earlyAndLateTimeBoundsActivated = true;
		$earlyAndLateBounds = TimeInterval::create()->withStart($earlyBound)->withEnd($lateBound);
	}

	/**
	 * Prints the object.
	 */
	public function printObject() {
		echo "<b>*** Printing AvailSchedule ***</b><br><hr>";
		echo "<b>* Available Days:</b> ";
		print_r ($this->getAvailableDays() );

		echo "<br><b>* Unavailable Days:</b> ";
		print_r ($this->getUnavailableDays() );
		echo "<br>";

		for ($i = DaysOfWeek::Monday; $i <= DaysOfWeek::Sunday; $i++) {
			echo "<b>* Hours of $i:</b> ";
			$this->getHoursOfDay($i)->printObject();
		}
	
		echo "<br><hr><br><br>";
	}

// PRIVATE:

	/**
	 * The days in which and entity is available.
	 * @var associative array [DaysOfWeek => boolean]
	 */
	private $daysAvailability;

	/**
	 * The hours of every day of the week in which an entity is available.
	 * @var associative array [DaysOfWeek => MultiTimeInterval]
	 */
	private $hoursAvailability;

	/**
	 * If activated, Early Morning and Night (both TimePeriod) will have an early 
	 * and late bound, respectively.
	 * False by default.
	 * @var boolean
	 */
	private $earlyAndLateTimeBoundsActivated;

	/**
	 * How early is TimePeriod::EarlyMorning start time and how late is
	 * TimePeriod::Night end time.
	 * @var TimeInterval
	 */
	private $earlyAndLateBounds;

}


?>