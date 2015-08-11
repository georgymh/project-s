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
		$this->name = "NO_NAME";
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
	
	public function setName( $name ) {
		$this->name = $name;
	}

	public function setAvailSchedule( $availSchedule ) {
		if ($availSchedule != null) {
			$this->availSchedule = $availSchedule;
		} else {
			die("Error: trying set Instructor's AvailSchedule with null. Exiting...");
		}
	}

	public function setListOfClasses( $listOfClasses ) {
		$this->listOfClasses = $listOfClasses;
	}

	// Getters
	
	public function getName() {
		return $this->name;
	}

	public function getAvailSchedule() {
		return $this->availSchedule;
	}

	public function getListOfClasses() {
		return $this->listOfClasses;
	}

	// Other methods
	
	public function addClass( $newClass ) {
		$this->listOfClasses->push($newClass);
	}

	public function countClasses() {
		return $this->listOfClasses->count();
	}

	public function calculateTotalCredits() {
		$sumOfCredits = 0;

		foreach ($this->listOfClasses as $class) {
			$sumOfCredits += $class->getCredits();
		}

		return $sumOfCredits;
	}

	public function printObject() {
		echo "<hr>";
		echo "<b>*** Printing the Instructor object *** </b><br><br>";
		echo "<b>Name:</b> $this->name<br>";

		echo "<b>Schedule:</b> <br>";
		$this->availSchedule->printObject();

		echo "<b>List of classes (count: ".$this->countClasses()."; credit total: ".$this->calculateTotalCredits().") :</b> <br>";
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
	 * List of college classes that the instructor teaches.
	 * @var SplDoublyLinkedList [CollegeClass]
	 */
	private $listOfClasses;
}

?>