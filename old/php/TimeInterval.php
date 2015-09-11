<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

/*
*
* Class that represents a time interval.
* 
* It allows you to insert times in almost any format (whatever strtotime()
* recognizes). It outputs the time in 'Military Time' and HH:MM:SS format,
* and also does simple interval calculations.
*
* Note: the class supports a static variable $preventErrorBySwappingBounds
* (FALSE by default) that as the name hints, would prevent problems by 
* swapping the starting time and ending time when they don't make sense.
* 
*/

class TimeInterval {

// PUBLIC:

	// Constructors
	
	/* 
	* Default Constructor
	*/
	function __construct() {
		$this->start = NULL;
		$this->end = NULL;
	}

	/*
	* Overloaded Constructor Hack (A mix of factory and fluent interface style)
	*
	* Purpose: to initialize $start and $end.
	*
	* Usage: 
	* $newRoom = TimeInterval::create()->withStart("10 AM")->withEnd("12:30");
	* - DO NOT USE KEYWORD new WHEN USING THIS 'CONSTRUCTOR'
	* - USE START AND THEN END IF USING 
	* 
	* @param string $start 	The starting time in any time format.
	* @param string	$end 	The ending time in any time format.
	*/

		// Static constructor / Factory
		public static function create() {
			$instance = new self();
			return $instance;
		}

		// Prefix setter - fluent style
		public function withStart( $start ) {
			$formattedTime = strtotime($start);
			$formattedTime = $this->convertUnixTimeStampToHumanTime($formattedTime);
			$this->start = $formattedTime;

			if ($this->boundsNeedSwapping() && !self::$preventErrorBySwappingBounds) {
				echo "Warning: bounds need swapping and error prevention is not active.";
			}

			if ( self::$preventErrorBySwappingBounds == TRUE ) {
			 $this->swapBoundsIfNeeded();
			}

			return $this;
		}

		// Room Number setter - fluent style
		public function withEnd( $end ) {
			$formattedTime = strtotime($end);
			$formattedTime = $this->convertUnixTimeStampToHumanTime($formattedTime);
			$this->end = $formattedTime;

			if ($this->boundsNeedSwapping() && !self::$preventErrorBySwappingBounds) {
				echo "Warning: bounds need swapping and error prevention is not active.";
			}

			if ( self::$preventErrorBySwappingBounds == TRUE ) {
				$this->swapBoundsIfNeeded();
			}

			return $this;
		}

	// Getter methods
	
	public function getStart() {
		return $this->start;
	}

	public function getEnd() {
		return $this->end;
	}

	// Setter methods
	
	public function setStart( $start ) {
		$formattedTime = strtotime($start);
		$formattedTime = $this->convertUnixTimeStampToHumanTime($formattedTime);
		$this->start = $formattedTime;

		if ($this->boundsNeedSwapping() && !self::$preventErrorBySwappingBounds) {
			echo "Warning: bounds need swapping and error prevention is not active.";
		}

		if ( self::$preventErrorBySwappingBounds == TRUE ) {
			$this->swapBoundsIfNeeded();
		}
	}

	public function setEnd( $end ) {
		$formattedTime = strtotime($end);
		$formattedTime = $this->convertUnixTimeStampToHumanTime($formattedTime);
		$this->end = $formattedTime;

		if ($this->boundsNeedSwapping() && !self::$preventErrorBySwappingBounds) {
			echo "<font color='yellow'>Warning: bounds need swapping and error prevention is not active.</font><br>Erroneous TimeInterval: ";
			$this->printObject();
		}

		if ( self::$preventErrorBySwappingBounds == TRUE ) {
			$this->swapBoundsIfNeeded();
		}
	}

	// Other methods

	/*
	* Returns the difference between $start and $end in HH:MM:SS format.
	*/
	public function getDifference() {
		if ( $this->end != NULL && $this->start != NULL ) {			
			$start_time = new DateTime($this->start);
			$end_time = new DateTime($this->end);
			$diff_time = date_diff($start_time, $end_time);
			return $diff_time->format('%H:%I:%S');
		} else {
			return 0;
		}
	}

	/*
	* Prints the time interval.
	*/
	public function printObject() {
		echo "<hr>";
		echo "<b>Starting Time:</b> $this->start <br>";
		echo "<b>Ending Time:</b> $this->end <br>";
		echo "<hr>";
	}

	// Static variable and functions
	
	/*
	* Set true to prevents errors by swapping start and end.
	* Note: It is FALSE by default.
	* 
	* @var boolean
	*/
	public static $preventErrorBySwappingBounds = FALSE;

// PRIVATE:

	/*
	* Starting time of the interval.
	* @var string (time) [format: HH:MM:SS]
	*/
	private $start;

	/*
	* Starting time of the interval.
	* @var string (time) [format: HH:MM:SS]
	*/
	private $end;

	/*
	* Returns a date in HH:MM:SS format.
	* @param int Unix timestamp of the time to convert to readable format.
	*/
	private function convertUnixTimeStampToHumanTime($time) {
		// To get the HH:MM:SS format.
		return date ('H:i:s', $time);
	}

	/*
	* Swaps start and end only if start is greater than end.
	*/
	private function swapBoundsIfNeeded() {
		if ( $this->boundsNeedSwapping() ) {

			$temp = $this->start;
			$this->start = $this->end;
			$this->end = $temp;

		}
	}

	/**
	 * Detects if Bounds have to be changed.
	 */
	private function boundsNeedSwapping() {
		return ( $this->start > $this->end 	&& 
		 $this->start != NULL 		&&
		 $this->end != NULL );
	}

}

?>