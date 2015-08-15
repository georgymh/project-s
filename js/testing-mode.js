var TESTING_MODE = true;

$(document).ready(function() {

	if (TESTING_MODE) {
	  fillStepOne();
	  fillStepTwo();
	  fillStepThree();
	}

	function fillStepOne() {

		$('#department-name').val('Clark Computing Center');
		$('#building-name').val('Clark Computing Center');

		var weekdayOpeningTime = "7:00am";
		var weekdayClosingTime = "10:00pm";

		var weekendOpeningTime = "9:00am";
		var weekendClosingTime = "6:00pm";

		var weekdays = ["monday", "tuesday", "wednesday",
							"thursday", "friday", "saturday", "sunday"];

		for (var i = 0; i < weekdays.length; i++) {
			if (i <= 5) {
				// Weekday.
				$('#' + weekdays[i] + '-checkbox').click();
				$('#' + weekdays[i] + '-starting-hours').val(weekdayOpeningTime);
				$('#' + weekdays[i] + '-ending-hours').val(weekdayClosingTime);
			} else {
				// Weekend day.
				$('#' + weekdays[i] + '-checkbox').click();
				$('#' + weekdays[i] + '-starting-hours').val(weekendOpeningTime);
				$('#' + weekdays[i] + '-ending-hours').val(weekendClosingTime);
			}
		}

		// Turn sunday off.
		$('#sunday-checkbox').click();
	}

	function fillStepTwo() {

	}

	function fillStepThree() {
		$('#instructor-first-name').val('John');
		$('#instructor-last-name').val('Doe');

		$('#full-time-radio').click();

		$('#class-title').val('CS 170');
		$('#hours').val('3.4');
		$('#frequency').val('1')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 150');
		$('#hours').val('5.6');
		$('#frequency').val('2')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 250');
		$('#hours').val('5.6');
		$('#frequency').val('3')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 200');
		$('#hours').val('5.7');
		$('#frequency').val('4')
		$('#add-class-btn').trigger('click');

	}

});