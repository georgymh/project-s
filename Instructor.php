<?php 

/*
	Georgy Marrero.
	August 10, 2015.
*/

require_once 'AvailSchedule.php';
require_once 'HelperEnums.php';

class Instructor {
// PUBLIC:
	
	// Default constructor
	function __construct() {
		$this->name = "";
		$this->availSchedule = new InstructorAvailSchedule();
		$this->listOfClasses = new SplDoublyLinkedList();
	}

	/** 
	 * Overloaded constructor.
	 */
		// Static constructor / Factory
		public static function create() {
			$instance = new self();
			return $instance;
		}

		// Name setter - fluent style
		public function withName( $name ) {
			$this->name = $name;
			return $this;
		}

		// Schedule setter - fluent style
		public function withSchedule( $schedule ) {
			if ($schedule != null) {
				$this->availSchedule = $schedule;
			} else {
				die("Error: trying set Instructor's AvailSchedule with null. Exiting...");
			}
			
			return $this;
		}

		// List of classes setter - fluent style
		public function withListOfClasses( $listOfClasses ) {
			$this->listOfClasses = $listOfClasses;
			return $this;
		}

	// Setters
	
	function setName( $name ) {
		$this->name = $name;
	}

	function setAvailSchedule( $availSchedule ) {
		if ($availSchedule != null) {
			$this->availSchedule = $availSchedule;
		} else {
			die("Error: trying set Instructor's AvailSchedule with null. Exiting...");
		}
	}

	function setListOfClasses( $listOfClasses ) {
		$this->listOfClasses = $listOfClasses;
	}

	// Getters
	
	function getName() {
		return $this->name;
	}

	function getAvailSchedule() {
		return $this->availSchedule;
	}

	function getListOfClasses() {
		return $this->listOfClasses;
	}

	// Other methods
	
	function addClass( $newClass ) {
		$this->listOfClasses->addClass($newClass);
	}

	function printObject() {
		echo "<hr>";
		echo "<b>*** Printing the Instructor object *** </b><br><br>";
		echo "<b>Name:</b> $this->name<br>";

		echo "<b>Schedule:</b> <br>";
		$this->availSchedule->printObject();

		echo "<b>List of classes:</b> <br>";
		if (!$this->listOfClasses->isEmpty()) {
			foreach ($this->listOfClasses as $class) {
				$class->printObject();
			}
		} else {
			echo "no classes!";
		}

		 echo "<br><hr><br><br>";
	}


// PRIVATE:
	/**
	 * Name of the instructor.
	 * @var string
	 */
	private $name;

	/**
	 * Availability schedule of the instructor.
	 * @var InstructorAvailSchedule
	 */
	private $availSchedule;

	/**
	 * List of classes that the instructor teaches.
	 * @var SplDoublyLinkedList [Class]
	 */
	private $listOfClasses;
}






?>