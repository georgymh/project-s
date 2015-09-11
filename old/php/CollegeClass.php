<?php

/*
	Georgy Marrero.
	August 10, 2015.
*/

include_once 'HelperClasses.php';

class CollegeClass {
// PUBLIC:

	// Default Constructor
	
	function __construct() {
		$this->title = "NO_TITLE";
		$this->credits = null; // HAS TO BE SET.
		$this->frequencyPerWeek = null;  // HAS TO BE SET.
		$this->period =  CollegeClassSemestrialPeriod::FullSemester;
	}

	// Setters
	public function setTitle( $title ) {
		$this->title = $title;
	}

	public function setCredits( $credits ) {
		$this->credits = $credits;
	}

	public function setWeeklyFrequency( $weeklyFrequency ) {
		$this->weeklyFrequency = $weeklyFrequency;
	}

	public function setPeriod( $period ) {
		$this->period = $period;
	}

	// Getters 
	public function getTitle( ) {
		return $this->title;
	}

	public function getCredits( ) {
		return $this->credits;
	}

	public function getWeeklyFrequency( ) {
		return $this->weeklyFrequency;
	}

	public function getPeriod( ) {
		return $this->period;
	}

	// Other methods
	public function printObject( ) {
		echo "<hr>";

		echo "<b>*** Printing the Class object *** </b><br><br>";

		echo "<b>Title:</b> $this->title<br>";

		echo "<b>Credits:</b> $this->credits<br>";

		echo "<b>Weekly Frequency:</b> $this->weeklyFrequency<br>";

		echo "<b>Semestrial Period:</b> $this->period<br>";

		echo "<br><hr><br><br>";
	}

// PRIVATE:

	/**
	 * Title of the class.
	 * @var string
	 */
	private $title;

	/**
	 * Quantity of credits for a class.
	 * @var CollegeClassCredits
	 */
	private $credits;

	/**
	 * How many times per week the class is taught.
	 * @var CollegeClassWeeklyFrequency
	 */
	private $weeklyFrequency;

	/**
	 * How long (from a full period -- semester or quarter) the class is taught for.
	 *
	 * For now, we are only working with Semesters.
	 * 
	 * @var CollegeClassSemestrialPeriod
	 */
	private $period;
}

// CLASS ENUMS:

/**
 * ClassSemestrialPeriod
 */
abstract class CollegeClassSemestrialPeriod extends BasicEnum {
    const FirstHalf = 0;
    const SecondHalf = 1;
    const FullSemester = 2;
}

/**
 * ClassWeeklyFrequency
 */
abstract class CollegeClassWeeklyFrequency extends BasicEnum {
    const OncePerWeek = 1;
    const TwicePerWeek = 2;
    const ThricePerWeek = 3;
    const MondayToThursday = 4;
}

/**
 * ClassCredits
 */
abstract class CollegeClassCredits extends BasicEnum {
    const Three = 3;
    const Four = 4;
    const Five = 5;
}

?>
