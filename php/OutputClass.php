<?php

// INCLUDES

/*
	This class uses Dependency Injection for the following member data:
		- instructor
		- classOcurrence
		- room
 */
require_once 'HelperClasses.php';
require_once 'HelperEnums.php';

/**
 * ScheduleType Enum
 */
abstract class ScheduleType extends BasicEnum {
    const ByInstructor = 1; 	// Instructor as the whole screen, Day as a column, Class with Room inside schedule box.
    const ByRoom = 2;			// Room as the whole screen, Day as a column, Class with Instructor inside schedule box.
    const ByDay = 3; 			// Day as the whole screen, Room as a column, Class with Instructor inside schedule box.
}

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
		$roomTitle = $this->room->getPrefix() . " " . $this->room->getNumber();
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
		
		$rawData = array();

		switch( $scheduleType ) {
		case ByInstructor:
			$name = $this->title . ' ' . $this->getRoomName();
		break;
		case ByRoom:
			$name = $this->title . ' ' . $this->getInstructorName();
		break;
		// case ByDay:
		// 	$name = $this->title . ' ' . $this->getInstructorName();
		// break;
		}

		$dayPilotDays = array();
		$days = $this->classOcurrence->getAvailableDays();		
		foreach($days as $day) {
			$dayPilotDays = getDayForDayPilot($day); // Sets day
		}

		// Set time in ISO8601 (append to each $dayPilotDays).
		// Note: set for both 'start' and 'end'
		
		// Create array with $name, $start and $end for each occurrence

		// $start = "";
		// $end = "";
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
}

$dayPilotDayTranslationData = [
	DaysOfWeek::Monday 		=> new DateTime("2006-01-01");
	DaysOfWeek::Tuesday 	=> new DateTime("2006-01-02");
	DaysOfWeek::Wednesday 	=> new DateTime("2006-01-03");
	DaysOfWeek::Thursday 	=> new DateTime("2006-01-04");
	DaysOfWeek::Friday 		=> new DateTime("2006-01-05");
	DaysOfWeek::Saturday 	=> new DateTime("2006-01-06");
	DaysOfWeek::Sunday 		=> new DateTime("2006-01-07");
]; 

function getDayForDayPilot($day) {
	return $dayPilotDayTranslationData[$day];
}

?>