var TESTING_MODE = true;

$(document).ready(function() {

	if (TESTING_MODE) {
	  fillStepOne();
	  fillStepTwo();
	  fillStepThree();

	  // jQuery(document).ready(function() {
	  //   fillDataFromStepOne();
	  //   fillDataFromStepTwo();
	  //   sendByAjax();
	  // });
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
			if (i < 4) {
				// Weekday.
				$('#' + weekdays[i] + '-checkbox').click();
				$('#' + weekdays[i] + '-starting-hours').val(weekdayOpeningTime);
				$('#' + weekdays[i] + '-ending-hours').val(weekdayClosingTime);
			} else {
				// Weekend day (including Friday)
				$('#' + weekdays[i] + '-checkbox').click();
				$('#' + weekdays[i] + '-starting-hours').val(weekendOpeningTime);
				$('#' + weekdays[i] + '-ending-hours').val(weekendClosingTime);
			}
		}

		// Turn sunday off.
		$('#sunday-checkbox').click();
	}

	function fillStepTwo() {
		var prefix = $('#room-prefix');
		var number = $('#room-number');
		var addBtn = $('#add-room-btn');

		var prefixTest = "CC";
		var prefixNumberStart = 100;
		var numOfRoomsToAdd = 9;

		for (var i = 0; i < numOfRoomsToAdd; i++) {
			prefix.val(prefixTest);
			number.val(prefixNumberStart++);
			addBtn.trigger('click');
		}

		// And just fill an extra one but not add it.
		prefix.val(prefixTest);
		number.val(prefixNumberStart);
	}

	function fillStepThree() {
		$('#instructor-first-name').val('John');
		$('#instructor-last-name').val('Doe');

		$('#full-time-radio').click();

		$('#class-title').val('CS 170');
		$('#class-hours').val('3.4');
		$('#class-frequency').val('1')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 150');
		$('#class-hours').val('5.6');
		$('#class-frequency').val('2')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 250');
		$('#class-hours').val('5.6');
		$('#class-frequency').val('3')
		$('#add-class-btn').trigger('click');

		$('#class-title').val('CS 200');
		$('#class-hours').val('5.7');
		$('#class-frequency').val('4')
		$('#add-class-btn').trigger('click');

	}

	function sendByAjax() {
	    var JSONData = {};
	    JSONData.data = data;

	    $.ajax({
	                type: "POST",
	                url: "process.php",
	                data: JSONData,
	                success: function(replyObj) {
	                    console.log('success');
	                    console.log(replyObj);
	                    $('#testing').html(replyObj);
	                },
	                error: function() {
	                    console.log('error');
	                },
	                complete: function() {
	                    console.log('complete');
	                }
	    });
	}

});