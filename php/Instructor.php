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
		$this->firstName = "NO_FIRST_NAME";
		$this->lastName = "NO_LAST_NAME";
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

		// First Name setter - fluent style
		public function withFirstName( $fName ) {
			$this->firstName = $fName;
			return $this;
		}

		// Last Name setter - fluent style
		public function withLastName( $lName ) {
			$this->lastName = $lName;
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
	
	public function setFirstName( $fName ) {
		$this->firstName = $fName;
	}

	public function setLastName( $lName ) {
		$this->lastName = $lName;
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
	
	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function getFullName() {
		return $this->lastName . ', ' . $this->firstName;
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
		echo "<b>Name:</b> ". $this->getFullName() . "<br>";

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
	 * First name of the instructor.
	 * @var string
	 */
	private $firstName;

	/* Last name of the instructor.
	 * @var string
	 */
	private $lastName;

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