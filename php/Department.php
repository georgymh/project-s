<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

// Inclusions.
require_once('DaysOfWeek.php');
require_once('TimeInterval.php');
require_once('AvailSchedule.php');

class Department {
// PUBLIC:

	// Normal Default Constructor
	function __construct() {
		$this->departmentName = "NO_DEPARTMENT_NAME";

		$this->operationSchedule = new DepartmentAvailSchedule();

		$this->listOfRooms = new SplDoublyLinkedList();
	}

	// Useful methods

	/**
	 * Adds a room to the bottom of the list of rooms.
	 * @param Room $room room to add.
	 */
	public function addRoom( $room ) {
		if ($this->listOfRooms == null) {
			$this->listOfRooms = new SplDoublyLinkedList();
		}

		$this->listOfRooms->push( $room );
	}

	/**
	 * Adds a day and hours in which the department and its rooms will operate.
	 * 
	 * @param DaysOfWeek $day   		Days of operation
	 * @param TimeInterval $interval  	Hours of operation
	 */
	public function addOperationDayAndTime( $day, $interval ) {
		$this->operationSchedule->setAvailableTimeInterval( $day, $interval );
	}

	// Setters
	
	/**
	* Sets the name of the department that manages all the rooms.
	*
	* @param string $newName The name of the department.
	*/
	public function setName( $newName ) {
		$this->name = $newName;
	}

	/**
	* Sets the hours of every day in which the department (and its rooms) will 
	* operate.
	*
	* NOTE: THIS IS AN OPTIONAL METHOD.
	*
	* @param DepartmentAvailSchedule $newSchedule
	*/
	public function setOperationSchedule ( $newSchedule ) {
		$this->operationSchedule = $newSchedule;
	}

	// Getters
	
	public function getName() {
		return $this->name;
	}

	public function getDaysOpened() {
		return $this->daysOpened;
	}

	public function getHoursOpened() {
		return $this->hoursOpened;
	}

	public function getListOfRooms() {
		return $this->listOfRooms;
	}

	// Other methods
	
	/*
	* Prints the room information.
	*/
	public function printObject() {
		echo "<hr>";
		echo "*** Printing the object *** <br><br>";
		echo "<b>Building name:</b> " . $this->name . " <br>";

		echo "<b>Operation Schedule:</b> <br>";
		$this->operationSchedule->printObject();

		echo "<b>List of rooms (count: ". count($this->listOfRooms) ."):</b> <br>";
		foreach($this->listOfRooms as $room) {
			$room->printObject();
		}
		
		echo "<br><hr><br><br>";
	}

// PRIVATE:
	/**
	* Represents the name of the department that manages all the rooms.
	*
	* @var string
	*/
	private $name;

	/**
	* Represents the days and hours of the week that the department and its 
	* rooms are operating.
	*
	* @var DepartmentAvailSchedule
	*/
	private $operationSchedule;


	/**
	 * The list of rooms that belong to a department.
	 *
	 * @var doubly linked list (SplDoublyLinkedList) of Room
	 */
	private $listOfRooms;
}

?>