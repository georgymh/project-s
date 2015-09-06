
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Scheduling system for colleges and universities.">
    <meta name="author" content="ScheduleZilla">

	<title>ScheduleZilla</title>

	<!-- CSS -->
    <link href="vendors/css/bootstrap.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/css/jquery.timepicker.css" rel="stylesheet">
    <link href="resources/css/steps.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Top Menu -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href='.'>Schedulezilla</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><strong>Contact Us</strong></a> 
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div id="main-container" class="container">
    <div class="well-container col-md-8 col-md-offset-2">
		<form class="form-horizontal" id="main-form" method="post">

            <!-- Begin Step One (1) -->
            <fieldset class="step well" id="step-one" style="display:none">
                <input type="hidden" id="data" name="data">
                <h2 class="step-title">Step 1: Building and Hours of Operation</h2>

                <div class="pad-top-xsm">
                    <h4>Department and building information:</h4>
                    <small>Please type the name of your <strong>department</strong> and the name of your <strong>building</strong>. If your department is in charge of various physical buildings, just type the main one. This is purely informational.</small>
                        
                    <div class="form-group">
                      <div class="col-md-6">
                        <label class="control-label" for="department-name">Department Name</label>
                        <input class="form-control input-md" id="department-name" name="department-name" type="text">
                      </div>
                      <div class="col-md-6">
                        <label class="control-label" for="building-name">Building Name</label> 
                        <input class="form-control input-md" id="building-name" name="building-name" type="text">
                      </div>
                    </div>
                </div>

                <div class="pad-top">
                    <h4>Days and time of operation:</h4>
                    <small>Please <strong>select</strong> the days in which the main building opens, and <strong>click</strong> on the corresponding textboxes to select the time it opens and closes for each day.</small>
                
                    <!-- Heading -->
                    <div class="row pad-top-xsm text-center">
                        <div class="col-md-4">
                            <p class="column-heading">Days</p>
                        </div>
                        
                        <div class="col-md-4">
                            <p class="column-heading">Opening time</p>
                        </div>
                        
                        <div class="col-md-4">
                            <p class="column-heading">Closing time</p>
                        </div>
                    </div>
                                
                    <!-- Monday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Monday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Tuesday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Tuesday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Wednesday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Wednesday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Thursday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Thursday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Friday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Friday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Saturday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Saturday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!-- Sunday Checkbox -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <!-- Checkbox -->
                            <label class="form-control">
                                Sunday
                                <input class="days-checkbox pull-right" type="checkbox" onclick="toggleHours(this)">
                            </label>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Starting time -->
                            <input type="text" class="time ui-timepicker-input starting-hours" autocomplete="off" disabled>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Ending time -->
                            <input type="text" class="time ui-timepicker-input ending-hours" autocomplete="off" disabled>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="btn-container">
                    <button type="button" class="next btn btn-lg btn-info pull-right">Next</button>
                </div>
            </fieldset>

            <!-- Begin Step Two (2) -->
            <fieldset class="step well" id="step-two" style="display:none">
                    <h2 class="step-title">Step 2: Rooms in the Building</h2>

                    <h4>Rooms information:</h4>
                    <small>Please add the rooms that your department controls. You will be able to add classes into each of the different rooms of your department.</small>

                    <div class="row pad-top-sm form-container">
                      <div class="col-md-offset-1 col-md-3">
                        <label>Room prefix:</label>
                        <input class="form-control input-md" id="room-prefix" name="textinput" type="text">

                        <label class="pad-top-xsm">Room number:</label>
                        <input class="form-control input-md" id="room-number" name="textinput" type="text">

                        <div class="text-center pad-top-sm">
                            <button type="button" id="add-room-btn" class="btn btn-default text-center">Add Room</button>
                        </div>

                        <hr>

                        <div class="pad-top-sm text-center">
                            <h5>Total rooms entered:</h5>
                            <h3><span id="room-count">0</span></h3>
                        </div>
                      </div>
                   
                      <div class="col-md-7" id="table-format">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-8 text-center">
    				            <p class="column-heading">List of Rooms</p>
    				            <p class="text-muted" id="rooms-entered">No Rooms Entered</p>
                                <div>
                                    <ul class="list-unstyled text-center" id="room-list"></ul>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row btn-container">
                        <button type="button" class="action back btn btn-lg pull-left">Back</button>
                        <button type="submit" class="action next btn btn-lg btn-info pull-right">Go to Schedule</button>
                    </div>

                </fieldset>
        </form>
    </div>
</div>

</body>

<!-- JS // Placed at the end of the document so the pages load faster  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="vendors/js/bootstrap.js"></script>
<script src="vendors/js/jquery.timepicker.js"></script>

<script src="resources/js/checkbox-dropdown.js"></script>
<script src="resources/js/form.js"></script>
<script src="resources/js/populate-data.js"></script>
<script src="resources/js/data.js"></script>
<script src="resources/js/room-table.js"></script>

<!-- Testing mode -->
<script src="resources/js/testing-mode.js"></script>

</html>