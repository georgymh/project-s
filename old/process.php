<?php

	// Code that receives info from Javascript and index.html
		// Just grab the JSON data from the POST request. 
	
	// Code that puts all the received info into the Input Classes
		// Using the department, room, instructor, collegeclass PHP classes.
	
	// Code that perform all the sorting algorithms and starts populating the Output Classes
		// The Master Algorithm will do this.

	// Code that exports and stores the entire Output Classes
		// Maybe to an SQL Database, but initially just a JSON file stored locally
		//		Example: http://jondavidjohn.com/show-non-public-members-with-json_encode/
		//		Example 2: http://stackoverflow.com/questions/1306740/json-vs-serialized-array-in-database
		//		Example 3: http://www.elated.com/articles/object-oriented-php-autoloading-serializing-and-querying-objects/
	
		// NOTE: There should also be a code that imports from the JSON file into the Output Classes.
	
	// Code that converts the info from the Output Classes and turns it into DayPilot-recognizable data
	
		// Details:	
		// 			1) The Output Class has to able to create a DayPilot-recognizable 
		// 			dataset FOR EVERY INSTRUCTOR, showing every day of the week on each 
		// 			column, and inside the calendar entry the Class name and Room.
		// 			
		// 			2) Also a dataset FOR EVERY ROOM, showing every day of the week on each
		// 			column, and inside the calendar entry the Class name and the Instructor
		// 			name.
		// 			
		// 			3) Lastly, a dataset FOR EVERY DAY OF THE WEEK, showing every room as a
		// 			column, and inside the calendar entry the Class name and the Instructor
		// 			name (NOTE: for this one, DayPilot needs to be modified to accept more
		// 			than 7 columns, it has to start on an specific date, and we need to map 
		// 			each room to a day).
		
		// Example: 	
		// 			$name = "Class Name";
		//			$start = "2015-08-10T10:10:00";
		//			$end = "2015-08-10T12:00:00";
	
	include_once 'php/DaysOfWeek.php';

	// Set error logs options.
	ini_set("log_errors", 1);
	ini_set("error_log", __DIR__ . "/tmp/php-error.log");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// 0. Pre routines: Get the POST data and verify it's set.
		if (isset($_POST["data"]) && !empty($_POST["data"])) {
			$data = $_POST["data"];
		} else {
			echo 0;
			exit(); 
		}

		//print_r ($data);

		// 1. Put JSON data into variables.
		
		// 1.a. Step One - Building/Department info
		$stepOneData = $data["stepOne"];
		$departmentName = $stepOneData["department"];
		$buildingName = $stepOneData["building"];
		$operatingHours = $stepOneData["operatingHours"]; // array
		$mondayHours = array("open" => $operatingHours["monOpeningHours"],
							 "close" => $operatingHours["monClosingHours"]);
		$tuesdayHours = array("open" => $operatingHours["tuesOpeningHours"],
							 "close" => $operatingHours["tuesClosingHours"]);
		$wednesdayHours = array("open" => $operatingHours["wedOpeningHours"],
							 "close" => $operatingHours["wedClosingHours"]);
		$thursdayHours = array("open" => $operatingHours["thursOpeningHours"],
							 "close" => $operatingHours["thursClosingHours"]);
		$fridayHours = array("open" => $operatingHours["friOpeningHours"],
							 "close" => $operatingHours["friClosingHours"]);
		$saturdayHours = array("open" => $operatingHours["satOpeningHours"],
							 "close" => $operatingHours["satClosingHours"]);
		$sundayHours = array("open" => $operatingHours["sunOpeningHours"],
							 "close" => $operatingHours["sunClosingHours"]);
		$operatingDaysWithHours = [DaysOfWeek::Monday => $mondayHours, 
								   DaysOfWeek::Tuesday => $tuesdayHours, 
								   DaysOfWeek::Wednesday => $wednesdayHours,
								   DaysOfWeek::Thursday => $thursdayHours, 
								   DaysOfWeek::Friday => $fridayHours, 
								   DaysOfWeek::Saturday => $saturdayHours,
								   DaysOfWeek::Sunday => $sundayHours];

		// 1.b. Step Two - Room info
		$stepTwoData = $data["stepTwo"];
		$rooms = $stepTwoData["rooms"];

		// 1.c Step Three - Instructor and Classes info
		
		// 1.d (optional) Print the variables.
		// echo "========= TESTING (PRINTING) =========\n";
		// echo "Department name: " . $departmentName . "\n";
		// echo "Building name: " . $buildingName . "\n";
		// $daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
		// 				"Saturday", "Sunday"];
		// echo "Operating Hours: \n";
		// for ($i = 0; $i < count($daysOfWeek); $i++) {
		// 	$dayWithHours = $operatingDaysWithHours[$i];
		// 	echo $daysOfWeek[$i] . ": " . $dayWithHours["open"] . " to " . $dayWithHours["close"];
		// 	echo "\n";
		// }
		// echo "Rooms (count: " . count($rooms) . "): \n";
		// foreach($rooms as $room) {
		// 	echo $room . "\n";
		// }

		// 2. Store information into Input Classes.
		// 2.a Store the info.
		include 'php/IncludeInputClasses.php';

		$department = new Department();
		$department->setName($departmentName);
		foreach($operatingDaysWithHours as $day => $hours) {
			if ($hours["open"] != null && $hours["close"] != null){
				// The day is set.
				$hoursOfOperation = TimeInterval::create()->withStart($hours["open"])->withEnd($hours["close"]);
				$department->addOperationDayAndTime( $day, $hoursOfOperation );
			} else {
				// The day is not set -- we skip it.
			}
		}

		foreach($rooms as $room) {
			$prefixAndNumber = split(" ", $room);
			$department->addRoom( Room::create()->withPrefix($prefixAndNumber[0])->withRoomNumber($prefixAndNumber[1]) );
		}

		// 2.b. Verify everything is full/with no errors.
		// PROBABLY WON'T HAVE THIS ON VERSION 0.1.

		// 2.c. (optional) Print the data.
		$department->printObject();
	}

?>