var TESTING_MODE = true;

$(document).ready(function() {

	if (TESTING_MODE) {
	  fillStepOne();
	  fillStepTwo();
	  fillStepThree();
	}

	function fillStepOne() {

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