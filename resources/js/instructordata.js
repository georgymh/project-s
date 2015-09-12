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
		instructor.classes = [];
		instructorData.push(instructor);

		// Add instructor into the instructor box
		var instructorHeader;
		if (instructor.type == 'fulltime') {
			instructorHeader = $('#full-time-header');
		} else {
			instructorHeader = $('#part-time-header');
		}
		instructorHeader.after('<li><a href="#">' + instructor.lastName + ', ' + instructor.firstName + '</a></li>');

		// Auto-select the just added instructor -- probably only for testing.
		instructorHeader.siblings('li').children('a').first().click();
		
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

// Add class
$(document).ready(function() {
	$('#add-class-btn').on('click', function() {
		// Get current instructor and verify it's valid
		var instructor = getCurrentInstructor();
		if (instructor == null) {
			return false;
		}

		// Add new class into instructor's 'classes' object 
		var newClass = {};
		newClass.title = sanitizeText($('#class-title').val());
		newClass.totalHours = parseInt($('#class-total-hours').val());
		newClass.weeklyFrequency = parseInt($('#class-frequency').val());
		instructor.classes.push(newClass);

		// Add class into the class box
		generateDraggableEventsFromClassData(newClass);

		// Clear the modal
		$('#class-title').val('');
		$('#class-total-hours').val('');
		$('#class-frequency').val('');

		// Hide the modal
		$('#addClassModal').modal('hide');
	});
});

function generateDraggableEventsFromClassData(aClass) {
	// Remove the '-' holder if needed
	if ($('#class-inner-box').find('.first-time')) {
		$('#class-inner-box').find('.first-time').remove();
	}

	// Create the events and put into class list box
	var newDraggableEvent = $("<div>", {class: "fc-event"});
	newDraggableEvent.append('<h5><span class="title">' + aClass.title + '</span> (' + '1/2' + ')</h5>');
	newDraggableEvent.append('<h6><b>Duration:</b> <span class="duration">' + generateClassDuration(aClass) + '</span></h6>');
	$('#class-inner-box').append(newDraggableEvent);

	// Make event draggable
	enableDraggability();
}

function generateClassDuration(aClass) {
	return '1:00';
}

/* Functions to manage the instructor data
*************************************************/

// On instructor click
$(document).ready(function() {
	$('#instructor-list').on('click', 'a', function(e) {
		e.preventDefault();

		// Get instructor from option and verify it's valid
		var fullName = $(this).text();
		var instructor = getInstructorFromFullName(fullName);
		console.log(instructor);
		if (instructor == null) {
			return false;
		}

		// Change current instructor
		$('#current-instructor').html(fullName);

		// Load data related to this instructor (e.g. its classes)
		loadInstructor(instructor);
	});
});

function loadInstructor(instructor) {
	// SHOW INSTRUCTOR'S UNADDED EVENTS
	// Take out all current events from class list side box
	$('#class-inner-box').html('');

	// Show each instructor class on the class list side box
	$.each(instructor.classes, function(key, aClass) {
		generateDraggableEventsFromClassData(aClass);
	});
}

/* Other functions
************************************************/

function getCurrentInstructor() {
	var fullName = $('#current-instructor').text().trim();

	// Prevent adding class without an instructor selected
	if (fullName == "-") {
		return null;
	}

	return getInstructorFromFullName(fullName);
}

function getInstructorFromFullName(fullName) {
	fullName = fullName.split(',');
	var firstName = fullName[1].trim();
	var lastName = fullName[0].trim();

	var instructor = null
	$.each(instructorData, function(key, value) {
		console.log(value.lastName);
		if (value.firstName == firstName && value.lastName == lastName) {
			instructor = value;
			return false;
		}
	});

	return instructor;
}

function generateUUID(){
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });
    return uuid;
}

function sanitizeText(text) {
	return text.replace(/[^\w\s]/gi, '');
}