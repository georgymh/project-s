var TESTING_MODE = false;

$(document).ready(function() {

	if (TESTING_MODE) {
	  fillStepOne();
	  fillStepTwo();
 
	}

	function fillStepOne() {

		$('#department-name').val('Clark Computing Center');
		$('#building-name').val('Clark Computing Center');

		var weekdayOpeningTime = "7:00am";
		var weekdayClosingTime = "10:00pm";

		var weekendOpeningTime = "9:00am";
		var weekendClosingTime = "6:00pm";

		$('#step-one').find('.days-checkbox').each(function() {
        	$(this).click()
            $(getStartingHoursTextField( this )).val(weekdayOpeningTime);
            $(getEndingHoursTextField( this )).val(weekdayClosingTime);

    	});

		// Turn sunday off.
		$('.days-checkbox').last().click();
	}

	function fillStepTwo() {
		var prefix = $('#room-prefix');
		var number = $('#room-number');
		var addBtn = $('#add-room-btn');

		var prefixTest = "MBCC";
		var prefixNumberStart = 123;
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

});