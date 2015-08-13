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

?>