/* Initialization routines
-----------------------------------------------------------------*/

$(document).ready(function() {

initializeRoomData();

drawRoomBoxes(JSONData.rooms);

// Activate room boxes click interaction
$('.room-container').on('click', function() {
	$('.right-side-box').find('.room-container').each(function() {
		$(this).removeClass('current');
	});

	$(this).addClass('current');

	$('#current-room').text($(this).text());
	
	loadEventsFromRoomData( getCurrentRoomData() );		
});

// Click/Choose the first room
$('.room-container').first().click();

});

// HELPER METHODS TO Initialization routines

// Function that draws the room boxes
function drawRoomBoxes(rooms) {
	//console.log(rooms);
	var roomBoxes = '';

	for (var i = 0; i < rooms.length; i++) {
		var tempBox = '<div class="room-container"><div class="room-wrap"><div class="room-title">' +
					  rooms[i].prefix + ' ' + rooms[i].number + '</div></div></div>';

		roomBoxes += tempBox;

		if ((i + 1) % 3 == 0) {
			roomBoxes += "<div class='clear'></div>";
		}
	}

	roomBoxes += "<div class='clear'></div>";

	$('#right-container .right-side-box').append(roomBoxes);
}

// Function to initialize roomData
function initializeRoomData() {
	var rooms = JSONData.rooms;
	for (var i = 0; i < rooms.length; i++) {
		var newRoom = {};
		newRoom["_id"] = generateUUID();
		newRoom.title = rooms[i].prefix + " " + rooms[i].number;
		newRoom.classes = [];
		roomData.push(newRoom);
	}
}

/* EVENT-LOADING METHODS
-----------------------------------------------------------------*/

function loadEventsFromRoomData(roomData) {
	$('#calendar').fullCalendar('removeEvents');

	var classDataList = roomData.classes;
	var totalClasses = classDataList.length;
	for (var i = 0; i < totalClasses; i++) {
		console.log('try ' + i);
		renderEvent( createFCEventData(classDataList[i]), false );
	}
}

function renderEvent(fcEvent, addClassToRoom) {
	fcEvent.addToRoom = false;
	$('#calendar').fullCalendar( 'renderEvent', fcEvent );
}

/* RUNTIME METHODS
-----------------------------------------------------------------*/

// Function to get current room
function getCurrentRoom() {
	return $('#current-room').text();
}

// Function to get current roomData
function getCurrentRoomData() {
	var currentRoom = getCurrentRoom();
	for (var i = 0; i < roomData.length; i++) {
		if (roomData[i].title == currentRoom) {
			return roomData[i];
		}
	}
	return null;
}

/* OTHER METHODS
-----------------------------------------------------------------*/
var fcDay = [
	"2015-08-30", // Sun
	"2015-08-24", // Mon
	"2015-08-25", // Tue
	"2015-08-26", // Wed
	"2015-08-27", // Thu
	"2015-08-28", // Fri
	"2015-08-29"  // Sat
];

// Function to create an FC-recognizable event object.
function createFCEventData(id_list) {
	var eventData = getEventDataFromIdList(id_list);
	var theClass = getClassFromInstructorAndClassId( 
						getInstructorFromFullName(id_list.instructor), 
						id_list.class_id );

	var newEvent = {};
	newEvent.title = theClass.title;
	newEvent.start = fcDay[eventData.day] + "T" + eventData.start;
	newEvent.end = fcDay[eventData.day] + "T" + eventData.end;
	newEvent.instructor = id_list.instructor;
	newEvent.eventData_id = id_list.eventData_id;
	newEvent.class_id = id_list.class_id;
	
	return newEvent;
}

/* Runtime JSON Room data
-----------------------------------------------------------------*/

var roomData = [
	// {
	//  id : "", // String - id of the room
	// 	title : "", // String - title of the room (prefix + number)
	// 	classes : [
	// 		{
	//			eventData_id : "",
	//			instructor : "",
	//			class_id : ""
	// 		}
	// 	]			// Array of class data - classes corresponding to the room
	// }
];