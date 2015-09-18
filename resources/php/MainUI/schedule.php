<?php
	$TESTING_MODE = false;

	if ( !empty($_SESSION['stepsData']) && isset($_SESSION['stepsData']) ) {
		$data = $_SESSION['stepsData'];
	} else {
		// Using MainUI:
		MainUI::deleteSession();
	}

	// print_r($data);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<!-- CSS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet' />
<link href='http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.css' rel='stylesheet' />
<link href="vendors/css/bootstrap.css" rel='stylesheet' />

<!-- JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='vendors/js/jquery-ui.custom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.js'></script>
<script src='vendors/js/bootstrap.js'></script>

<script>

	var JSONData = JSON.parse('<?php echo $data ?>');
	console.log(JSONData);

	$(document).ready(function() {

		/* initialize the external events
		-----------------------------------------------------------------*/

		enableDraggability();

		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			/* General View */
			header: false, /*{
				left: 'prev,next',
				center: 'title',
				right: 'agendaWeek,agendaDay'
			},*/
			defaultView: 'agendaWeek',
			allDaySlot: false,
			columnFormat: 'dddd',
			defaultDate: '2015-08-24',
			aspectRatio: 1.1775,

			/* Days & hours properties */
			snapDuration: '00:05:00',
			//slotLabelInterval: '00:30:00',
			slotEventOverlap: true, // as default
			//hiddenDays: [ 0 ],
			firstDay: 1,
			minTime: '7:00',
			maxTime: '23:00',
			
			/* Events & actions */
			//events: getBusinessHours(),
			//businessHours: true,
			eventDurationEditable: false, // can't resize to edit event duration
			eventOverlap: false,
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function(date) {
				var eventData = getEventDataFromDraggableEvent(this);
				eventData.inCalendar = true;
				eventData.day = date.toDate().getDay();
				eventData.start = moment(date).format("HH:mm");
				eventData.end = moment(date).add(moment.duration(eventData.duration)).format("HH:mm");
				console.log('\nday: ' + eventData.day +
							'\nstart: ' + eventData.start +
							'\nend: ' + eventData.end);
				console.log('deleting');
				$(this).remove();
			},
			eventDrop: function(event, delta) {
				var eventData = getEventDataFromFCEvent(this);
				console.log('current ' + moment().day(eventData.day).get('day'));
				console.log('delta ' + delta.days());
				console.log('+ ' + moment().day(eventData.day).add(delta.days(), 'day').get('day'));
				eventData.day = moment().days(eventData.day).add(delta).get('day');
				eventData.start = moment(eventData.start, "HH:mm").add(delta).format('HH:mm');
				eventData.end = moment(eventData.end, "HH:mm").add(delta).format("HH:mm");
				console.log('\nday: ' + eventData.day +
							'\nstart: ' + eventData.start +
							'\nend: ' + eventData.end);
			},
			eventClick: function(event) {
		        alert('Event: ' + Date(event.start));

		        // change the border color just for fun
		        $(this).css('border-color', 'red');
		    },
		    eventRender: function(event, element) {
		        element.qtip({
		            content: event.instructor,
		            style: { 
		            	classes: 'qtip-bootstrap h5' 
		            },
		            position: {
		            	at: 'top center',
		            	my: 'bottom center'
		            }
		        });

		        element.data('eventData', event.eventData);
		    }
		});

});
	 
	
</script>
<style>

	body {
		margin-top: 40px;
		
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	hr {
		border-top: 1px solid #D8D8D8;
	}

	.pad-top { padding-top: 40px; }
	.pad-top-md { padding-top: 30px; }
	.pad-top-sm { padding-top: 20px; }
	.pad-top-xsm { padding-top: 10px; }
		
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
		height: 100%;
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
		max-height: 333.75px;
	}
		
	#class-inner-box .fc-event {
		margin: 10px 0;
		padding-left: 4px;
		cursor: pointer;
	}

	.fc-event-clone {
		padding: 0 10px;
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

	/* modal */
	.modal-section {
		text-align: center;
	}


</style>
</head>
<body>
	<div id='wrap'>

		<div id="left-container">
			<div id='instructor-box' class="left-side-box">
				<p class='box-description'>Current Instructor</p>
				<div id='current-instructor'>
					<span class="text-muted first-time"> - </span> 
				</div>
				<!--<input type="hidden" id="current-instructor-uuid">-->
 
				<hr style="margin-top: 10px">

				<div class="dropdown text-center">
				  <button class="btn btn-default dropdown-toggle" type="button" id="instructorList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    Change instructor
				    <span class="caret"></span>
				  </button>
				  <ul id='instructor-list' class='dropdown-menu' aria-labelledby="instructorList">
					<li class="dropdown-header" id="full-time-header">Full Time</li>
					<li class="dropdown-header" id="part-time-header">Part Time</li>
				  </ul>
				</div>

				<hr style="margin-bottom: 10px">

				<div class='text-center'>
					<button id='add-instructor' type="button" class="btn btn-default" data-toggle="modal" data-target="#addInstructorModal">Add Instructor</button>
				</div>
			</div>

			<!-- Add Instructor Modal -->
			<div class="modal fade" id="addInstructorModal" tabindex="-1" role="dialog" aria-labelledby="addInstructorModal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title text-center" id="addInstructorModalLabel">Add Instructor</h3>
			      </div>

			      <div class="modal-body pad-top-sm">
		              <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                        	<h4 class="modal-section">Instructor Information</h4>

							<div class="row pad-top-sm">
							  <div class="col-md-6">
							    <label class="control-label">First Name</label>
							    <input class="form-control input-md" id="first-name" name="textinput" type="text">
							  </div>
							  <div class="col-md-6">
							    <label class="control-label">Last Name</label>
							    <input class="form-control input-md" id="last-name" name="textinput" type="text">
							  </div>
							</div>

							<div class="row pad-top-sm">
							  <div class="col-md-4">
							    <label class="control-label">Type of Instructor:</label>
							  </div>
							  <div class="col-md-4">
							    <label class="radio-inline"><input type="radio" id="type-full-time" name="instructor-type" checked>Full Time</label>
							  </div>
							  <div class="col-md-4">
							    <label class="radio-inline"><input type="radio" id="type-part-time" name="instructor-type">Part Time</label>
							  </div>
							</div>
					    </div>
                      </div>
			      </div>

			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>
			        <button id='add-instructor-btn' type="button" class="btn btn-primary">Add Instructor</button>
			      </div>
			    </div>
			  </div>
			</div>

			<div id='class-box' class="left-side-box">
				<h4>List of Classes</h4>

				<div id='class-inner-box'>
					<?php
						if ($TESTING_MODE) {
							echo '<div class="fc-event"><h5><span class="title">CS A200</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>';
							echo '<div class="fc-event"><h5><span class="title">CS A200</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:35</span></h6></div>';
							echo '<div class="fc-event"><h5><span class="title">CS A170</span> (1/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>';
							echo '<div class="fc-event"><h5><span class="title">CS A170</span> (2/2)</h5> <h6><b>Duration:</b> <span class="duration">2:30</span></h6></div>';
							echo '<div class="fc-event"><h5><span class="title">CS A216</span> (1/1)</h5> <h6><b>Duration:</b> <span class="duration">5:00</span></h6></div>';
							echo '<div class="fc-event"><h5><span class="title">CS A216</span> (1/1)</h5> <h6><b>Duration:</b> <span class="duration">5:00</span></h6></div>';
						} else {
					?>

					<h3 class='text-muted text-center first-time'> - </h3>

					<?php
						}
					?>
				</div>

				<div class='text-center pad-top-xsm'>
					<button id='add-class' type="button" class="btn btn-default" data-toggle="modal" data-target="#addClassModal">Add Class</button>
				</div>
			</div>

			<!-- Add Class Modal -->
			<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title text-center" id="addClassModalLabel">Add Class for <span id='current-instructor-modal-text'></span></h3>
			      </div>

			      <div class="modal-body pad-top-sm">
		              <div class="row">
		              	<div class="col-md-offset-1 col-md-10">
		              		<h4 class="modal-section">Class Information</h4>
		              	</div>
		              </div>
		              <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                        	<div class='pad-top-xsm'>
	                            <label class="control-label">Class Title</label>
	                            <input id="class-title" name="class-title" class="form-control input-md" type="text" style="height:37.22222px">
	                        </div>

	                        <div class='pad-top-xsm'>
		                        <label class="control-label">Total Hours Per Semester</label>
		                        <div class="input-group">
							      <input id='class-total-hours' type="text" class="form-control" style="height:36.22222px" aria-label="Total Hours Per Semester">
							      <span class="input-group-addon" id="basic-addon2">hours</span>
							      <div class="input-group-btn">
							        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:36.22222px"><span class="caret"></span></button>
							        <ul class="dropdown-menu dropdown-menu-right">
							          <li><a class='total-hours-option' href="#">60</a></li>
							          <li><a class='total-hours-option' href="#">90</a></li>
							        </ul>
							      </div><!-- /btn-group -->
							    </div><!-- /input-group -->
							</div>
	                        
	                        <div class='pad-top-xsm'>
	                        	<label for="class-frequency">Desired Weekly Frequency</label>
	                            <select id="class-frequency" class="form-control" style="height:37.22222px">
	                                <option></option>
	                                <option value="1">Once per week</option>
	                                <option value="2">Twice per week</option>
	                                <option value="4">Monday through Thursday</option>
	                            </select>
	                        </div>

					    </div>
                      </div>
			      </div>

			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>
			        <button id='add-class-btn' type="button" class="btn btn-primary">Add Class</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>

		<div id='right-container'>
			<div class='right-side-box'>
				<p class='box-description'>Current Room</p>
				<div id='current-room'></div>

				<hr style="margin-top: 10px">

				<!--
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
				-->

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
	$(document).ready(function() {
		$('#addClassModal').on('shown.bs.modal', function () {
		  $('#current-instructor-modal-text').text($('#current-instructor').text()); // update current instructor in modal
		});

		$('.total-hours-option').click( function(e) {
			e.preventDefault();
			$('#class-total-hours').val($(this).text()); 
		});
		
	});

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
<script src='resources/js/ui-logic.js'></script>
<script src='resources/js/instructordata.js'></script>
<script src='resources/js/roomdata.js'></script>
<script src='resources/js/schedule-testing-mode.js'></script>
</html>
