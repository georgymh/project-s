
$(document).ready(function() {
// Draw the room boxes
drawRoomBoxes(JSONData.rooms);

/* Activate room boxes click
-----------------------------------------------------------------*/

$('.room-container').on('click', function() {
	$('.right-side-box').find('.room-container').each(function() {
		$(this).removeClass('current');
	});

	$(this).addClass('current');

	$('#current-room').text($(this).text());		
});

// Activate first room box
$('.room-container').first().click();

});

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