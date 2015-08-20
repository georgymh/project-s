<?php
/*
	Georgy Marrero
	August 19, 2015
 */

require_once '../OutputClass.php';

$class = new OutputClass();
$class->setTitle('CS 200');

$someRoom = Room::create()->withPrefix('CC')->withRoomNumber(104);
$class->setRoom($someRoom);

$someInstructor = Instructor::create()->withFirstName("Gabriela")->withLastName("Ernsberger");
$class->setInstructor($someInstructor);

$someClassOcurrence = new ClassOcurrence();
$classInterval = TimeInterval::create()->withStart('2:10PM')->withEnd('4:30PM');
$someClassOcurrence->setAvailableTimeInterval( DaysOfWeek::Monday, $classInterval );
$someClassOcurrence->setAvailableTimeInterval( DaysOfWeek::Wednesday, $classInterval );
$class->setClassOcurrence($someClassOcurrence);

$data = $class->generateJSONData( ScheduleType::ByInstructor );

print_r($data);

//$class->printObject();

?>