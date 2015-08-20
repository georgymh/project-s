<?php

/*
	Georgy Marrero
	August 19, 2015
 */

// INCLUDES
require_once 'HelperClasses.php';
require_once 'HelperEnums.php';
require_once 'DaysOfWeek.php';
require_once 'Room.php';
require_once 'Instructor.php';

/**
 * ScheduleType Enum
 */
abstract class ScheduleType extends BasicEnum {
    const ByInstructor = 1; 	// Instructor as the whole screen, Day as a column, Class with Room inside schedule box.
    const ByRoom = 2;			// Room as the whole screen, Day as a column, Class with Instructor inside schedule box.
    const ByDay = 3; 			// Day as the whole screen, Room as a column, Class with Instructor inside schedule box.
}

/*
	This class uses Dependency Injection for the following member data:
		- instructor
		- classOcurrence
		- room
 */
class OutputClass {
// PUBLIC:
	// Default Constructor
	function __construct() {
		$this->title = "NO_TITLE";

		// These have to be injected:
		$this->instructor = null;
		$this->classOcurrence = null;
		$this->room = null;
	}

	// Setters
	
	public function setTitle( $title ) {
		$this->title = $title;
	}

	public function setInstructor( $instructor ) {
		$this->instructor = $instructor;
	}

	public function setClassOcurrence( $classOcurrence ) {
		$this->classOcurrence = $classOcurrence;
	}

	public function setRoom( $room ) {
		$this->room = $room;
	}

	// Getters
	
	public function getTitle() {
		return $this->title;
	}

	public function getInstructor() {
		return $this->instructor;
	}

	public function getClassOcurrence() {
		return $this->classOcurrence;
	}

	public function getRoom() {
		return $this->room;
	}

	public function getRoomName() {
		$roomTitle = $this->room->getPrefix() . " " . $this->room->getRoomNumber();
		return $roomTitle;
	}

	public function getInstructorName() {
		return $this->instructor->getName();
	}

	// Other methods
	
	public function generateJSONData( $scheduleType ) {
		// Example: 	
		// 			$name = "Class Name";
		//			$start = "2015-08-10T10:10:00";
		//			$end = "2015-08-10T12:00:00";

		switch( $scheduleType ) {
		case ScheduleType::ByInstructor:
			$name = '<b>' . $this->title . '</b><br>Room: ' . $this->getRoomName();
		break;
		case ScheduleType::ByRoom:
			$name = '<b>' . $this->title . '</b><br>Instructor: ' . $this->getInstructorName();
		break;
		// case ScheduleType::ByDay:
		// 	$name = $this->title . ' ' . $this->getInstructorName();
		// break;
		}

		// Get days and hours to use with DayPilot and put into an array.
		$rawData = new stdClass();
		$rawData->data = array();
		// Get days.
		$days = $this->classOcurrence->getAvailableDays();		
		foreach($days as $day) {
			// Get hour of day.
			$hour = $this->classOcurrence->getHoursOfDay($day);

			// Change format of day to DayPilot-recognizable.
			$dayPilotDay = $this->dayInDayPilotFormat[$day];

			// Create time string used by DayPilot.
			$start = $dayPilotDay . "T" . $hour->getStart();
			$end = $dayPilotDay . "T" . $hour->getEnd();

			// Put data into rawData.
			$rawData->data[] = array(
				"name" => $name,
				"start" => $start,
				"end" => $end
			);
		}

		$JSONData = json_encode($rawData);

		return $JSONData;
	}

	public function printObject() {
		echo '<br>====== PRINTING CLASS ======';
		echo '<br>Title of Class: ' . $this->title;
		echo '<br>Instructor: ' . $this->instructor->getFullName();
		echo '<br>Class ocurrence: <br>';
		$this->classOcurrence->printObject();
		echo '<br>Room: ' . $this->room->getTitle();
		echo '<br>============================<br>';
	}

// PRIVATE:
	/**
	 * The title of the class.
	 * @var String
	 */
	private $title;

	/**
	 * The instructor that teaches the class.
	 * @var Instructor
	 */
	private $instructor;

	/**
	 * The days and hours in which the class will occur.
	 * @var ClassOcurrence
	 */
	private $classOcurrence;

	/**
	 * The room in which the class will be tought.
	 * @var Room
	 */
	private $room;

	private $dayInDayPilotFormat = array(
		DaysOfWeek::Monday 		=> "2006-01-01",
		DaysOfWeek::Tuesday 	=> "2006-01-02",
		DaysOfWeek::Wednesday 	=> "2006-01-03",
		DaysOfWeek::Thursday 	=> "2006-01-04",
		DaysOfWeek::Friday 		=> "2006-01-05",
		DaysOfWeek::Saturday 	=> "2006-01-06",
		DaysOfWeek::Sunday 		=> "2006-01-07"
	); 

	private function getDayInDayPilotFormat( $day ) {
		return $this->dayInDayPilotFormat[$day];
	}
}

?>