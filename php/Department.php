<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

// Inclusions.
require_once('DaysOfWeek.php');
require_once('TimeInterval.php');

class Department {
// PUBLIC:

	/*
	* Overloaded Constructor Hack (A mix of factory and fluent interface style)
	*/

		// Static constructor / Factory
		public static function create() {
			$instance = new self();
			$thilistOfRooms = new SplDoublyLinkedList();
			return $instance;
		}

		// Name setter - fluent style
		public function withName( $name ) {
			$this->name = $name;
			return $this;
		}

		// Days Opened setter - fluent style
		public function withDaysOpened( $days ) {
			$this->daysOpened = $days;
			return $this;
		}

		// Hours Opened setter - fluent style
		public function withHoursOpened( $hours ) {
			$this->hoursOpened = $hours;
			return $this;
		}

		// List of Rooms setter - fluent style
		public function withListOfRooms( $rooms ) {
			$this->listOfRooms = $rooms;
			return $this;			
		}


	// Normal Default Constructor
	
	function __construct() {
		$departmentName = "NO_DEPARTMENT_NAME";

		$daysOpened = [
			DaysOfWeek::Monday 		=> FALSE,
			DaysOfWeek::Tuesday 	=> FALSE,
			DaysOfWeek::Wednesday 	=> FALSE,
			DaysOfWeek::Thursday 	=> FALSE,
			DaysOfWeek::Friday 		=> FALSE,
			DaysOfWeek::Saturday 	=> FALSE,
			DaysOfWeek::Sunday 		=> FALSE
		];

		$emptyTimeInterval = new TimeInterval();

		$hoursOpened = [
			DaysOfWeek::Monday 		=> $emptyTimeInterval,
			DaysOfWeek::Tuesday 	=> $emptyTimeInterval,
			DaysOfWeek::Wednesday 	=> $emptyTimeInterval,
			DaysOfWeek::Thursday 	=> $emptyTimeInterval,
			DaysOfWeek::Friday 		=> $emptyTimeInterval,
			DaysOfWeek::Saturday 	=> $emptyTimeInterval,
			DaysOfWeek::Sunday 		=> $emptyTimeInterval
		];

		$listOfRooms = new SplDoublyLinkedList();
	}

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

	// Setters
	
	/*
	* Sets the name of the department that manages all the rooms.
	*
	* @param string $newName The name of the department.
	*/
	public function setName( $newName ) {
		$this->name = $newName;
	}

	/*
	* Sets the days in which the department (and its rooms) will be open.
	*
	* @param [DaysOfWeek => boolean] An associative array containing each
	*                       	     day of the week as keys, and booleans
	*                       	     as values (representing if the room is
	*                       	     operating on that day or not).
	*                          
	*/
	public function setDaysOpened ( $newDaysOpened ) {
		$this->daysOpened = $newDaysOpened;
	}

	/*
	* Sets the hours of every day in which the department (and its rooms) will 
	* operate.
	*
	* @param [DaysOfWeek => TimeInterval] An associative array containing each day 
	*                       		      of the week as keys, and time INTERVALS
	*                       		      as values that represent the interval of 
	*                       		      time that the rooms will operate per day.
	*/
	public function setHoursOpened ( $newHoursOpened ) {
		$this->hoursOpened = $newHoursOpened;
	}

	// Other methods
	
	/*
	* Prints the room information.
	*/
	public function printObject() {
		echo "<hr>";
		echo "*** Printing the object *** <br><br>";
		echo "<b>Building name:</b> " . $this->name . " <br>";

		echo "<b>Days Opened:</b> <br>";
		// Print associative array.
		print_r( $this->daysOpened );
		echo "<br>";

		echo "<b>Hours opened:</b> <br>";
		print_r( $this->hoursOpened );
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
	* Represents the days of the week that the department and its rooms are 
	* operating.
	*
	* @var associative array [DaysOfWeek => boolean]
	*/
	private $daysOpened;

	/**
	* Represents the hours of the week that the department and its rooms 
	* are operating.
	* 
	* @var associative array [DaysOfWeek => TimeInterval]
	*/
	private $hoursOpened;

	/**
	 * The list of rooms that belong to a department.
	 *
	 * @var doubly linked list (SplDoublyLinkedList) of Room
	 */
	private $listOfRooms;
}

?>