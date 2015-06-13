<?php 

// INCLUDE
require 'TimeInterval.php';

// TESTING BEGINS

//SECTION 1: preventErrorBySwappingBounds = FALSE
echo "preventErrorBySwappingBounds = FALSE (default)<br>";

// 1. Default Constructor before Static Variables
echo "1. Default Constructor (empty)<br>";
$mondayInterval = new TimeInterval();
$mondayInterval->printObject();

// 2. Overloaded Constructor Hack (10AM to 11AM)
echo "2. Overloaded Constructor Hack (10AM to 11AM)<br>";
$tuesdayInterval = TimeInterval::create()->withStart("10 AM")->withEnd("11 AM");
$tuesdayInterval->printObject();

// 3. Default Constructor and then set values (10AM to 9:15AM)
echo "3. Default Constructor and then set values (10AM to 9:15AM)<br>";
$wednesdayInterval = new TimeInterval();
$wednesdayInterval->setStart("10:00:00");
$wednesdayInterval->setEnd("9:15:00");
$wednesdayInterval->printObject();

// 4. Default Constructor and then set start only (5PM to NULL)
echo "4. Default Constructor and then set start only (5PM to NULL)<br>";
$thursdayInterval = new TimeInterval();
$thursdayInterval->setStart("5 pm");
$thursdayInterval->printObject();

// 5. Default Constructor and then set start only (NULL to 6:15AM)
echo "5. Default Constructor and then set start only (NULL to 6:15AM)<br>";
$fridayInterval = new TimeInterval();
$fridayInterval->setEnd("6:15 am");
$fridayInterval->printObject();

// 6. Overloaded Constructor (6:40PM to 9:22PM) and then set start (7:20PM)
echo "6. Overloaded Constructor (6:40PM to 9:22PM) and then set start (7:20PM)<br>";
$saturdayInterval = TimeInterval::create()->withStart("6:40 PM")->withEnd("9:22 PM");
$saturdayInterval->setStart("7:20 PM");
$saturdayInterval->printObject();

// 7. Overloaded Constructor (11:15PM to 9:10PM)
echo "7. Overloaded Constructor (11:15PM to 9:10PM)<br>";
$sundayInterval = TimeInterval::create()->withStart("11:15 PM")->withEnd("9:10 PM");
$sundayInterval->printObject();

// 8. Interval Test
echo "<b>Testing Intervals:</b><br>";
echo $mondayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $tuesdayInterval->getDifference() . " // should be 1 hr";
echo "<br>";
echo $wednesdayInterval->getDifference() . " // should be 45 mins";
echo "<br>";
echo $thursdayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $fridayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $saturdayInterval->getDifference() . " // should be 2 hrs, 2 mins";
echo "<br>";
echo $sundayInterval->getDifference() . " // should be 2 hrs, 5 mins";
echo "<br><br><br><br><hr><br><br><br>";

// ##############################################

//SECTION 2: preventErrorBySwappingBounds = TRUE
echo "preventErrorBySwappingBounds = TRUE (explicitly set)<br>";
TimeInterval::$preventErrorBySwappingBounds = TRUE;

// 1. Default Constructor before Static Variables
echo "1. Default Constructor (empty)<br>";
$mondayInterval = new TimeInterval();
$mondayInterval->printObject();

// 2. Overloaded Constructor Hack (10AM to 11AM)
echo "2. Overloaded Constructor Hack (10AM to 11AM)<br>";
$tuesdayInterval = TimeInterval::create()->withStart("10 AM")->withEnd("11 AM");
$tuesdayInterval->printObject();

// 3. Default Constructor and then set values (10AM to 9:15AM)
echo "3. Default Constructor and then set values (10AM to 9:15AM)<br>";
$wednesdayInterval = new TimeInterval();
$wednesdayInterval->setStart("10:00:00");
$wednesdayInterval->setEnd("9:15:00");
$wednesdayInterval->printObject();

// 4. Default Constructor and then set start only (5PM to NULL)
echo "4. Default Constructor and then set start only (5PM to NULL)<br>";
$thursdayInterval = new TimeInterval();
$thursdayInterval->setStart("5 pm");
$thursdayInterval->printObject();

// 5. Default Constructor and then set start only (NULL to 6:15AM)
echo "5. Default Constructor and then set start only (NULL to 6:15AM)<br>";
$fridayInterval = new TimeInterval();
$fridayInterval->setEnd("6:15 am");
$fridayInterval->printObject();

// 6. Overloaded Constructor (6:40PM to 9:22PM) and then set start (7:20PM)
echo "6. Overloaded Constructor (6:40PM to 9:22PM) and then set start (7:20PM)<br>";
$saturdayInterval = TimeInterval::create()->withStart("6:40 PM")->withEnd("9:22 PM");
$saturdayInterval->setStart("7:20 PM");
$saturdayInterval->printObject();

// 7. Overloaded Constructor (11:15PM to 9:10PM)
echo "7. Overloaded Constructor (11:15PM to 9:10PM)<br>";
$sundayInterval = TimeInterval::create()->withStart("11:15 PM")->withEnd("9:10 PM");
$sundayInterval->printObject();

// 8. Interval Test
echo "<b>Testing Intervals:</b><br>";
echo $mondayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $tuesdayInterval->getDifference() . " // should be 1 hr";
echo "<br>";
echo $wednesdayInterval->getDifference() . " // should be 45 mins";
echo "<br>";
echo $thursdayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $fridayInterval->getDifference() . " // should be 0";
echo "<br>";
echo $saturdayInterval->getDifference() . " // should be 2 hrs, 2 mins";
echo "<br>";
echo $sundayInterval->getDifference() . " // should be 2 hrs, 5 mins";
echo "<br>";

?>