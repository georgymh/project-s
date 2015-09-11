var instructorData = 
[
	// { 
	// 	"firstName" : "",
	// 	"lastName" : "",
	// 	"type" : "", // String - 'parttime' or 'fulltime'
	// 	"classes" : [
	// 		{
	// 			"title" : "",
	// 			"totalHours" : "", // Integer
	// 			"weeklyFrequency" : "" // Integer
	// 		}
	// 	], // array of classes
	// 	"classesInsideCalendar" : [ ], // These are FullCalendar event objects that were already created
	// 								   // and are inside the calendar frame. These objects also contain
	// 								   // their room information.

	// 	"classesOutsideCalendar" : [ ] // These are FullCalendar event objects that can be displayed in 
	// 								   // the class list left side box, and ready to be dropped into the
	// 								   // calendar frame. On this event, it will be transfered into the
	// 								   // "classesInsideCalendar" array.
	// }
]; // array of instructors

/* Functions that populate the instructor data
*************************************************/

// Add instructor
$(document).ready(function() {
	$('#add-instructor-btn').on('click', function() {
		// Check that the user put a first and last name (validate)
		var fName = sanitizeText($('#first-name').val()).trim();
		var lName = sanitizeText($('#last-name').val()).trim();
		if (fName.length < 1 || lName.length < 1) {
			return false;
		}

		// Add new instructor into 'instructorData'
		var instructor = {};
		instructor.firstName = fName;
		instructor.lastName = lName;
		instructor.type = getTypeOfInstructor();
		instructor.classes = {};
		instructorData.push(instructor);

		// Add instructor into the instructor box
		var instructorHeader;
		if (instructor.type == 'fulltime') {
			instructorHeader = $('#full-time-header');
		} else {
			instructorHeader = $('#part-time-header');
		}
		instructorHeader.after('<li><a href="#">' + instructor.lastName + ', ' + instructor.firstName + '</a></li>');
		
		// Clear the modal
		$('#first-name').val('');
		$('#last-name').val('');
		$('#type-full-time').prop('checked', true);

		// Hide the modal
		$('#addInstructorModal').modal('hide');
	});
});

function getTypeOfInstructor() {
	return $('#type-full-time').is(':checked') ? 'fulltime' : 'parttime';
}
