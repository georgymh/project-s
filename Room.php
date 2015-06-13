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

	public static function getDepartmentName() {
		return self::$departmentName;
	}

	public static function getDaysOpened() {
		return self::$daysOpened;
	}

	public static function getHoursOpened() {
		return self::$hoursOpened;
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

	/*
	* Sets the name of the department that manages all the rooms.
	*
	* @param string $newDepartmentName The name of the department.
	*/
	public static function setDepartmentName( $newDepartmentName ) {
		self::$departmentName = $newDepartmentName;
	}

	/*
	* Sets the days in which all the rooms (collectively) will be open.
	*
	* @param [DaysOfWeek => boolean] An associative array containing each
	*                       	     day of the week as keys, and booleans
	*                       	     as values (representing if the room is
	*                       	     operating on that day or not).
	*                          
	*/
	public static function setDaysOpened ( $newDaysOpened ) {
		self::$daysOpened = $newDaysOpened;
	}

	/*
	* Sets the hours of every day in which the rooms (collectively) will
	* operate.
	*
	* @param [DaysOfWeek => INTERVAL] An associative array containing each
	*                       		  day of the week as keys, and TIME INTERVALS
	*                       		  as values that represent the interval of 
	*                       		  time that the rooms will operate per day.
	*/
	public static function setHoursOpened ( $newHoursOpened ) {
		self::$hoursOpened = $newHoursOpened;
	}

	// Helper methods
	
	/*
	* Prints the room information.
	*/
	public function printObject() {
		echo "<hr>";
		echo "*** Printing the object *** <br><br>";
		echo "<b>Room name:</b> $this->prefix $this->roomNumber <br>";
		echo "<b>Building name:</b> " . self::$departmentName . " <br>";

		echo "<b>Days Opened:</b> <br>";
		// Print associative array.
		print_r( self::$daysOpened );
		echo "<br>";

		echo "<b>Hours opened:</b> <br>";
		// Print associative array.
		print_r( self::$hoursOpened );
		echo "<br><hr><br><br>";

	}

// PRIVATE:

	/**
	* Represents the name of the department that manages all the rooms.
	*
	* Note: This variable is static so that you can return the building name from
	* any instance of the Room class.
	*
	* @var string
	*/
	private static $departmentName = "NO_DEPARTMENT_NAME";

	/**
	* Represents the days of the week that the building and its rooms are 
	* operating.
	*
	* Note: This variable is static because we ASSUME the rooms are opened when 
	* the department is opened. We ask for the days of operation only once.
	*
	* @var associative array [DaysOfWeek => boolean]
	*/
	private static $daysOpened;

	/**
	* Represents the hours of the week that the building and its rooms 
	* are operating.
	*
	* Note: This variable is static because we ASSUME the rooms are opened when the
	* department is opened. We ask ONCE for the hours of operation (per day) of the 
	* whole department.
	* 
	* @var associative array [DaysOfWeek => INTERVAL_OF_TIME]
	*/
	private static $hoursOpened;

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