<?php 

/*
	Georgy Marrero.
	June 12, 2015.
*/

// Include DaysOfWeeks
require_once('DaysOfWeek.php');

class Room {

// PUBLIC:	
	
	// Constructors
	
	/* 
	* Default Constructor
	*/
	function __construct() {
		$prefix = "";
		$roomNumber = 0;
	}

	/*
	* Overloaded Constructor Hack (A mix of factory and fluent interface style)
	*
	* Purpose: to initialize the two non-static variables of the Room class.
	*
	* Usage: $newRoom = Room::create()->withPrefix("CC")->withRoomNumber("101");
	* DO NOT USE KEYWORD new WHEN USING THIS 'CONSTRUCTOR'
	* 
	* @param string $prefix 	The room prefix.
	* @param int 	$roomNumber The number of the room.
	*/

		// Static constructor / Factory
		public static function create() {
			$instance = new self();
			return $instance;
		}

		// Prefix setter - fluent style
		public function withPrefix( $prefix ) {
			$this->prefix = $prefix;
			return $this;
		}

		// Room Number setter - fluent style
		public function withRoomNumber( $roomNumber ) {
			$this->roomNumber = $roomNumber;
			return $this;
		}


	// Getter methods
	
	public function getPrefix() {
		return $this->prefix;
	}

	public function getRoomNumber() {
		return $this->roomNumber;
	}

	public function getTitle() {
		return $this->prefix . " " . $this->roomNumber;
	}

	// Setter methods
	
	/*
	* Sets the prefix string.
	* 
	* @param string $newPrefix The room prefix.
	*/
	public function setPrefix( $newPrefix ) {
		$this->prefix = $newPrefix;
	}

	/*
	* Sets the room number.
	*
	* @param int 	$newRoomNumber The number of the room.
	*/
	public function setRoomNumber( $newRoomNumber ) {
		$this->roomNumber = $newRoomNumber;
	}

	// Helper methods
	
	/*
	* Prints the room information.
	*/
	public function printObject() {
		echo "<hr>";
		echo "*** Printing the object *** <br><br>";
		echo "<b>Room name:</b> $this->prefix $this->roomNumber <br>";
		//echo "<b>Building name:</b> " . self::$departmentName . " <br>";

		// echo "<b>Days Opened:</b> <br>";
		// // Print associative array.
		// print_r( self::$daysOpened );
		// echo "<br>";

		// echo "<b>Hours opened:</b> <br>";
		// // Print associative array.
		// print_r( self::$hoursOpened );
		 echo "<br><hr><br><br>";

	}

// PRIVATE:

	/**
	* Represents the prefix of the room.
	* Usually the prefix is used for all the rooms within a building.
	*
	* Example: CC, MATH, LEWIS, CHEM, etc.
	* 
	* @var string
	*/
	private $prefix;

	/**
	* Represents the identifier of the room.
	*
	* Example: 101, 102, 203, 305, 404, etc.
	*
	* @var int
	*/
	private $roomNumber;
}

?>