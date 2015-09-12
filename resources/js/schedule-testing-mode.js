$(document).ready(function() {
	$('#first-name').val('Gabriela');
	$('#last-name').val('Ernsberger');
	$('#add-instructor-btn').click();

	$('#class-title').val('CS A200');
	$('#class-total-hours').val('90');
	$('option[value=2]').attr('selected', 'selected');
	$('#add-class-btn').click();
});