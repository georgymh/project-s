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
	 * OVERWRITEN BY CHILDREN.
	 * @param  DaysOfWeek $day 
	 */
	public function getHoursOfDay( $day ) {

		if ( !isValidDay($day) ) {
			echo "Error: Day $day is not valid.<br>";
			exit();
		}
	}

	// Setters
	
	/**
	 * Sets a day as available.
	 */
	public function setDayAsAvailable( $day ) {
		$this->daysAvailability[$day] = TRUE;
	}

	// Helper methods

	/**
	 * Prints the object.
	 */
	public function printObject() {
		echo "<b>*** Printing Schedule ***</b><br><hr>";
		echo "<b>* Available Days:</b> ";
		print_r ($this->getAvailableDays() );

		echo "<br><b>* Unavailable Days:</b> ";
		print_r ($this->getUnavailableDays() );
		echo "<br>";
	}

// PRIVATE:

	/**
	 * The days in which and entity is available.
	 * @var associative array [DaysOfWeek => boolean]
	 */
	private $daysAvailability;

}








class DepartmentAvailSchedule extends AvailSchedule {
// PUBLIC:

	// Contructor
	function __construct() {
		parent::__construct();

		$this->hoursAvailability = [
			DaysOfWeek::Monday 		=> new TimeInterval(),
			DaysOfWeek::Tuesday 	=> new TimeInterval(),
			DaysOfWeek::Wednesday 	=> new TimeInterval(),
			DaysOfWeek::Thursday 	=> new TimeInterval(),
			DaysOfWeek::Friday 		=> new TimeInterval(),
			DaysOfWeek::Saturday 	=> new TimeInterval(),
			DaysOfWeek::Sunday 		=> new TimeInterval()
		];
	}

	/**
	 * Returns the hours of availability of a specific day.
	 * @param  DaysOfWeek $day 
	 * @return TimeInterval
	 */
	public function getHoursOfDay( $day ) {
		parent::getHoursOfDay($day);

		return $this->hoursAvailability[$day];
	}

	/**
	 * Adds a specific time period as an availability on a day.
	 * 
	 * @param DaysOfWeek $day    
	 * @param TimeInterval $timeInterval
	 */
	public function setAvailableTimeInterval( $day, $timeInterval ) {
		if ( isValidDay($day) ) {
			parent::setDayAsAvailable($day);
			$this->hoursAvailability[$day] = $timeInterval;
		}
	}

	public function printObject() {
		parent::printObject();

		for ($i = DaysOfWeek::Monday; $i <= DaysOfWeek::Sunday; $i++) {
			echo "<b>* Hours of day # $i:</b> ";
			$this->getHoursOfDay($i)->printObject();
		}
	
		echo "<br><hr><br><br>";
	}

// PRIVATE:
	/**
	 * The hours of every day of the week in which a department is available.
	 * @var associative array [DaysOfWeek => TimeInterval]
	 */
	private $hoursAvailability;
}










class InstructorAvailSchedule extends AvailSchedule {
// PUBLIC:

	// Constructor
	function __construct() {
		parent::__construct();

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

		$this->earlyAndLateBounds = [
			DaysOfWeek::Monday 		=> TimeInterval::create(),
			DaysOfWeek::Tuesday 	=> TimeInterval::create(),
			DaysOfWeek::Wednesday 	=> TimeInterval::create(),
			DaysOfWeek::Thursday 	=> TimeInterval::create(),
			DaysOfWeek::Friday 		=> TimeInterval::create(),
			DaysOfWeek::Saturday 	=> TimeInterval::create(),
			DaysOfWeek::Sunday 		=> TimeInterval::create()
		];
	}

	/**
	 * Sets the early and late time bounds for the earliest and lates time periods,
	 * from a Department Schedule.
	 * 
	 * @param DepartmentAvailSchedule $departmentAvailSchedule
	 */
	public function setEarlyAndLateTimeBoundsFromDepartmentSchedule( $departmentAvailSchedule ) {
		$this->earlyAndLateTimeBoundsActivated = true;

		$availableDays = $departmentAvailSchedule->getAvailableDays();
		foreach($availableDays as $day) {
			// Set Early Bound for $day
			$startTimeOfDepartment = $departmentAvailSchedule->getHoursOfDay($day)->getStart();
			$this->earlyAndLateBounds[$day]->setStart( $startTimeOfDepartment );

			// Set Late Bound for $day
			$endTimeOfDepartment = $departmentAvailSchedule->getHoursOfDay($day)->getEnd();
			$this->earlyAndLateBounds[$day]->setEnd( $endTimeOfDepartment );
		}
	}

	/**
	 * Returns the hours of availability of a specific day.
	 * @param  DaysOfWeek $day 
	 * @return MultiTimeInterval
	 */ 
	public function getHoursOfDay( $day ) {
		parent::getHoursOfDay($day);

		return $this->hoursAvailability[$day];
	}

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
						$newInterval->setStart( $this->earlyAndLateBounds[$day]->getStart() );
					} else {
						// Default bounds.
						$newInterval = getIntervalFromPeriod($timePeriod);
					}
				break;
				case TimePeriod::LateMorningAndAfternoon:
					$newInterval = getIntervalFromPeriod($timePeriod);
				break;
				case TimePeriod::Evening:
					$newInterval = getIntervalFromPeriod($timePeriod);
				break;
				case TimePeriod::Night:
					if ($this->earlyAndLateTimeBoundsActivated) {
						$newInterval = getIntervalFromPeriod($timePeriod);
						$newInterval->setEnd( $this->earlyAndLateBounds[$day]->getEnd() );
					} else {
						// Default bounds.
						$newInterval = getIntervalFromPeriod($timePeriod);
					}
				break;
				default:
					echo "ERROR: default value on AvailSchedule::setAvailableTimePeriod() -- fix ASAP!";
				}

				parent::setDayAsAvailable($day);
				$this->hoursAvailability[$day]->addInterval($newInterval); // success.
			} else {
				echo "Error: Time Period $timePeriod is not valid.";
				exit();
			}
			
		} else {
			echo "Error: Day $day is not valid.<br>";
			exit();
		}
	}

	public function printObject() {
		parent::printObject();
		
		for ($i = DaysOfWeek::Monday; $i <= DaysOfWeek::Sunday; $i++) {
			echo "<b>* Hours of day # $i:</b> ";
			$this->getHoursOfDay($i)->printObject();
		}
	
		echo "<br><hr><br><br>";
	}

// PRIVATE:
	/**
	 * The hours of every day of the week in which an instructor is available.
	 * @var associative array [DaysOfWeek => MultiTimeInterval]
	 */
	private $hoursAvailability;

	/**
	 * If activated, the earliest and latest TimePeriods will have a specified 
	 * early and late bound, respectively. If not activated, the bounds will be
	 * set by the constants DEFAULT_EARLY_BOUND and DEFAULT_LATE_BOUND.
	 * 
	 * False by default.
	 * 
	 * @var boolean
	 */
	private $earlyAndLateTimeBoundsActivated;

	/**
	 * Represents how early is TimePeriod::EarlyMorning start time and how late is
	 * TimePeriod::Night end time, on every day.
	 * @var associative array [DaysOfWeek => TimeInterval]
	 */
	private $earlyAndLateBounds;
}






class ClassOcurrence extends AvailSchedule {
// PUBLIC:

	// Contructor
	function __construct() {
		parent::__construct();

		$this->hoursOcurrence = [
			DaysOfWeek::Monday 		=> new TimeInterval(),
			DaysOfWeek::Tuesday 	=> new TimeInterval(),
			DaysOfWeek::Wednesday 	=> new TimeInterval(),
			DaysOfWeek::Thursday 	=> new TimeInterval(),
			DaysOfWeek::Friday 		=> new TimeInterval(),
			DaysOfWeek::Saturday 	=> new TimeInterval(),
			DaysOfWeek::Sunday 		=> new TimeInterval()
		];
	}

	/**
	 * Returns the hours of availability of a specific day.
	 * @param  DaysOfWeek $day 
	 * @return TimeInterval
	 */
	public function getHoursOfDay( $day ) {
		parent::getHoursOfDay($day);

		return $this->hoursOcurrence[$day];
	}

	/**
	 * Adds a specific time period as an availability on a day.
	 * 
	 * @param DaysOfWeek $day    
	 * @param TimeInterval $timeInterval
	 */
	public function setAvailableTimeInterval( $day, $timeInterval ) {
		if ( isValidDay($day) ) {
			parent::setDayAsAvailable($day);
			$this->hoursOcurrence[$day] = $timeInterval;
		}
	}

	public function printObject() {
		parent::printObject();

		for ($i = DaysOfWeek::Monday; $i <= DaysOfWeek::Sunday; $i++) {
			echo "<b>* Hours of day # $i:</b> ";
			$this->getHoursOfDay($i)->printObject();
		}
	
		echo "<br><hr><br><br>";
	}

// PRIVATE:
	/**
	 * The hours of every day of the week in which a department is available.
	 * @var associative array [DaysOfWeek => TimeInterval]
	 */
	private $hoursOcurrence;
}

?>