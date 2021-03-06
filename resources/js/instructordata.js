var instructorData = 
[
	// {
	//  "_id" : "",
	// 	"firstName" : "",
	// 	"lastName" : "",
	// 	"type" : "", 						// String - 'parttime' or 'fulltime'
	// 	"classes" : [
	// 		{
	// 			"_id" : "",
	// 			"title" : "", 				// String
	// 			"totalHours" : "", 			// Integer
	// 			"weeklyFrequency" : "" 		// Integer
	// 			"eventData" : [
	// 				"_id" : "",
	// 				"eventNumber" : 0, 		// Integer
	// 				"inCalendar" : "",		// Boolean
	// 				"room" : "",			// String - room title
	// 				"day" : "",				// String - day (mon, tues, wed...)
	// 				"duration" : "",		// String - time (hh:mm)
	// 				"start" : "",			// String - time (hh:mm)
	// 				"end" : ""				// String - time (hh:mm)
	// 			]
	// 		}
	// 	] // array of classes
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
		instructor["_id"] = generateUUID();
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
		newClass["_id"] = generateUUID();
		newClass.title = sanitizeText($('#class-title').val());
		newClass.totalHours = parseInt($('#class-total-hours').val());
		newClass.weeklyFrequency = parseInt($('#class-frequency').val());
		instructor.classes.push(newClass);

		// Create the events
		createEvents(newClass);

		// Clear the modal
		$('#class-title').val('');
		$('#class-total-hours').val('');
		$('#class-frequency').val('');

		// Hide the modal
		$('#addClassModal').modal('hide');
	});
});

// Creating eventData
function createEvents(aClass) {
	aClass.events = [];

	var classDuration = generateClassDuration(aClass);
	var totalEvents = aClass.weeklyFrequency;
	for (id = 1; id <= totalEvents; id++) {
		var newEvent = {};
		newEvent["_id"] = generateUUID();
		newEvent.eventNumber = id;
		//newEvent.title = aClass.title;
		//newEvent.instructor = $('#current-instructor').text();
		newEvent.inCalendar = false;
		newEvent.duration = classDuration;
		aClass.events.push(newEvent);

		drawDraggableEvent(newEvent, totalEvents, aClass);
	}

	enableDraggability();
}

function drawDraggableEvent(event, eventsQty, aClass) {
	// Remove the '-' holder if needed
	if ($('#class-inner-box').find('.first-time')) {
		$('#class-inner-box').find('.first-time').remove();
	}

	var newDraggableEvent = $("<div>", {class: "fc-event"});
	var eventFraction = event.eventNumber.toString() + '/' + eventsQty.toString();
	newDraggableEvent.append('<h5><span class="title">' + aClass.title + '</span> (' + eventFraction + ')</h5>');
	newDraggableEvent.append('<h6><b>Duration:</b> <span class="duration">' + event.duration + '</span></h6>');

	addMetaDataToDraggableEvent(newDraggableEvent, aClass['_id'], event['_id']);

	$('#class-inner-box').append(newDraggableEvent);
}

function generateClassDuration(aClass) {
	function ceilTime(duration, minutesBoundary) {
		var hours = Math.floor(duration);
		var minutes = Math.floor((duration - hours) * 60);

		for (i = minutes; i <= 60 + minutesBoundary; i++) {
			if ( (i % 60) % minutesBoundary == 0 ) {
				if (i >= 60) {
					hours++;
				}

				minutes = i % 60;

				break;
			} 		
		}

		// Add extra 0 if needed (if minutes is a single-digit integer)
		var newMinutes = minutes.toString();
		if (newMinutes.length < 2) {
			newMinutes = '0' + newMinutes;
		}

		return hours.toString() + ':' + newMinutes;
	}

	var hoursPerWeek = aClass.totalHours / JSONData.weeksInASemester;
	var classDuration = hoursPerWeek / aClass.weeklyFrequency;
	var ceiledDuration = ceilTime(classDuration, 5);

	return ceiledDuration;
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
		$.each(aClass.events, function(key, event) {
			if (!event.inCalendar) {
				drawDraggableEvent(event, aClass.events.length, aClass);
			}
		});
	});

	enableDraggability();
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

	var instructor = null;
	$.each(instructorData, function(key, value) {
		if (value.firstName == firstName && value.lastName == lastName) {
			instructor = value;
			return false;
		}
	});

	return instructor;
}

function getClassFromInstructorAndClassId(instructor, classId) {
	var theClass = null;
	$.each(instructor.classes, function (index, aClass) {
	  if (aClass['_id'] == classId) {
	  	theClass = aClass;
	  	return false;
	  }
	});

	return theClass;
}

function getEventFromClassAndEventId(aClass, eventDataId) {
	var theEvent = null;
	$.each(aClass.events, function (index, anEvent) {
	  if (anEvent['_id'] == eventDataId) {
	  	theEvent = anEvent;
	  	return false;
	  }
	});

	return theEvent;
}

function getEventDataFromDraggableEvent(draggableEventElem) {
	var elemEventData = $(draggableEventElem).data('event');
	return getEventDataFromIdList(elemEventData);
}

function getEventDataFromFCEvent(fcEventElem) {
	var fcElemEventData = $(fcEventElem).data('id_data');
	return getEventDataFromIdList(fcElemEventData);
}

function getEventDataFromIdList(idList) {
	var instructor = getInstructorFromFullName(idList.instructor);
	var theClass = getClassFromInstructorAndClassId(instructor, idList.class_id);
	var theEvent = getEventFromClassAndEventId(theClass, idList.eventData_id);
	return theEvent;
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