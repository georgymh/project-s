
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

	var data = JSON.parse('<?php echo $data ?>');

	$(document).ready(function() {

		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

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
				revertDuration: 0  //  original position after the drag
			});

		});

		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			allDaySlot: false,
			snapDuration: '00:05:00',
			//slotLabelInterval: '00:30:00',
			slotEventOverlap: true, // as default
			hiddenDays: [ 0 ],
			minTime: '7:00',
			maxTime: '23:00',
			aspectRatio: 1.35,
			//events: getBusinessHours(),
			//businessHours: true,
			eventDurationEditable: false, // can't resize to edit event duration
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
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		padding-left: 4px;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
		width: 900px;
	}

	#add-class {
		margin-top: 10px;
		margin-bottom: 12px;
	}

</style>
</head>
<body>
	<div id='wrap'>

		<div id='external-events'>
			<h4>Draggable Events</h4>
			<div class='fc-event'><h5><span class="title">CS A200</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>
			<div class='fc-event'><h5><span class="title">CS A200</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>
			<div class='fc-event'><h5><span class="title">CS A170</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>
			<div class='fc-event'><h5><span class="title">CS A170</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>
			<div class='fc-event'><h5><span class="title">CS A216</span> (1/1)</h5> <h6><b>Duration:</b> <span class="duration">5:00</span></h6></div>

			<div class='text-center'>
				<button id='add-class' type="button" class="btn btn-default">Add Class</button>
			</div>
		</div>


		<div id='calendar'></div>

		<div style='clear:both'></div>

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
