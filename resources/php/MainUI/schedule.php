<?php

	if ( !empty($_SESSION['stepsData']) && isset($_SESSION['stepsData']) ) {
		$data = $_SESSION['stepsData'];
	} else {
		// Using MainUI:
		MainUI::deleteSession();
	}

	//print_r($data);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<!-- CSS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href="vendors/css/bootstrap.css" rel='stylesheet' />

<!-- JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='vendors/js/jquery-ui.custom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js'></script>
<script src='vendors/js/bootstrap.js'></script>
<script>

	var JSONData = JSON.parse('<?php echo $data ?>');
	console.log(JSONData);

	$(document).ready(function() {

		/* room events
		-----------------------------------------------------------------*/

		$('.room-container').on('click', function() {
			$('.right-side-box').find('.room-container').each(function() {
				$(this).removeClass('current');
			});

			$(this).addClass('current');

			$('#current-room').text($(this).text());		
		});

		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#class-inner-box .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).find('.title').text()), // use the element's text as the event title
				duration: $(this).find('.duration').text(),
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0,  //  original position after the drag

				// these set of options are to allow the dedired effect
				// inside the scrollable div created in #class-inner-box:
				appendTo: 'body',
				scroll: false,
				helper: 'clone',
				containment: 'window'
			});

		});

		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek,agendaDay'
			},
			defaultView: 'agendaWeek',
			allDaySlot: false,
			snapDuration: '00:05:00',
			//slotLabelInterval: '00:30:00',
			slotEventOverlap: true, // as default
			hiddenDays: [ 0 ],
			firstDay: 1,
			minTime: '7:00',
			maxTime: '23:00',
			aspectRatio: 1.35,
			//events: getBusinessHours(),
			//businessHours: true,
			eventDurationEditable: false, // can't resize to edit event duration
			eventOverlap: false,
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function(date) {
					$(this).remove();
			}
		});

});
	 
	
</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	hr {
		border-top: 1px solid #D8D8D8;
	}
		
	#wrap {
		width: 100%;
		padding: 0 50px;
		margin: 0 auto;
	}

	#left-container {
		float: left;
	}

	#calendar {
		margin-left: 230px;
		margin-right: 270px;
		overflow: hidden;
	}

	#right-container {
		float: right;
	}
		
	.left-side-box {	
		width: 180px;
		padding: 0 10px;
		padding-bottom: 10px;
		margin-bottom: 15px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}

	.left-side-box h4,
	.right-side-box h4 {
		font-size: 15px;
		margin-top: 0;
		padding-top: 1em;
		margin-bottom: 1.5rem;
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
	}

	.left-side-box p input {
		margin: 0;
		vertical-align: middle;
	}

	.box-description {
		text-transform: uppercase;
		text-align: center;
		font-size: 11px;
		margin-top: 10px;
		font-weight: bold;
		color: #383838;
	}

	#current-instructor,
	#current-room {
		text-align: center;
		font-size: 24px;
	}

	#class-inner-box {
		overflow-y: auto;
		max-height: 307.78px;
	}
		
	#class-inner-box .fc-event {
		margin: 10px 0;
		padding-left: 4px;
		cursor: pointer;
	}

	#class-inner-box .fc-event h5,
	#class-inner-box .fc-event h6 {
		margin-top: 6px;
		margin-bottom: 6px;
	}
		
	#class-inner-box p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}

	.right-side-box {
		width: 220px;
		padding: 0 10px;
		padding-bottom: 10px;
		margin-bottom: 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}

	.room-container {
		width: 30%;
		margin-left: 1.67%;
		margin-right: 1.67%;
		margin-bottom: 5px;
		height: 50px;
		float: left;
		background-color: #D0D0D0;
		display: table;
	}

	.current {
		background-color: #3a87ad;
		color: white;
	}

	.room-wrap {
		display:table-cell;
		vertical-align:middle;
	}

	.room-title {
		text-align: center;
	}

	.clear {
		clear: both;
	}

</style>
</head>
<body>
	<div id='wrap'>

		<div id="left-container">
			<div id='instructor-box' class="left-side-box">
				<p class='box-description'>Current Instructor</p>
				<div id='current-instructor'>
					Ernsberger, Gabriela
				</div>

				<hr style="margin-top: 10px">

				<div class="dropdown text-center">
				  <button class="btn btn-default dropdown-toggle" type="button" id="instructorList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    Change instructor
				    <span class="caret"></span>
				  </button>
				  <ul id='instructor-list' class='dropdown-menu' aria-labelledby="instructorList">
					<li class="dropdown-header">Full Time</li>
					<li class="dropdown-header">Part Time</li>
				  </ul>
				</div>

				<hr style="margin-bottom: 10px">

				<div class='text-center'>
					<button id='add-instructor' type="button" class="btn btn-default">Add Instructor</button>
				</div>
			</div>

			<div id='class-box' class="left-side-box">
				<h4>List of Classes</h4>

				<div id='class-inner-box'>
					<div class='fc-event'><h5><span class="title">CS A200</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>
					<div class='fc-event'><h5><span class="title">CS A200</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>
					<div class='fc-event'><h5><span class="title">CS A170</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>
					<div class='fc-event'><h5><span class="title">CS A170</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>
					<div class='fc-event'><h5><span class="title">CS A216</span> (1/1)</h5> <h6><b>Duration:</b> <span class="duration">5:00</span></h6></div>
					<div class='fc-event'><h5><span class="title">CS A216</span> (1/1)</h5> <h6><b>Duration:</b> <span class="duration">5:00</span></h6></div>
				</div>

				<div class='text-center'>
					<button id='add-class' type="button" class="btn btn-default">Add Class</button>
				</div>
			</div>
		</div>

		<div id='right-container'>
			<div class='right-side-box'>
				<p class='box-description'>Current Room</p>
				<div id='current-room'>
					MBCC 123
				</div>

				<hr style="margin-top: 10px">

				<div class='room-container current'><div class="room-wrap"><div class='room-title'>MBCC 123</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 124</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 125</div></div></div>
				<div class='clear'></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 126</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 201</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 202</div></div></div>
				<div class='clear'></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 203</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 204</div></div></div>
				<div class='room-container'><div class="room-wrap"><div class='room-title'>MBCC 205</div></div></div>
				<div class='clear'></div>

				<!--
				<div class="dropdown text-center">
				  <button class="btn btn-default dropdown-toggle" type="button" id="roomList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    Change room
				    <span class="caret"></span>
				  </button>
				  <ul id='instructor-list' class='dropdown-menu' aria-labelledby="roomList">
				  </ul>
				</div>
				-->

			</div>
		</div>

		<div id='calendar'></div>


		<div style='clear:both'></div>

		<div class='pull-right' style='clear:both'><a href="resources/php/MainUI/deletesession.php?refresh=yes"> Logout </a></div>

	</div>
</body>

<script>

	function getBusinessHours() {
		return [
			    {
			        start: '00:00:00+02:00',
			        end: '07:30:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [1,2,3,4]
			    },

			    {
			        start: '00:00:00+02:00',
			        end: '9:00:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [5]
			    },

			    {
			        start: '17:00:00+02:00',
			        end: '24:00:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [5]
			    },

			    {
			        start: '22:30:00+02:00',
			        end: '24:00:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [1,2,3,4]
			    },

			    {
			        start: '00:00:00+02:00',
			        end: '9:00:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [6]
			    },

			    {
			        start: '15:00:00+02:00',
			        end: '24:00:00+02:00',
			        color: 'gray',
			        rendering: 'background',
			        dow: [6]
			    }
			];
	}

</script>
</html>
