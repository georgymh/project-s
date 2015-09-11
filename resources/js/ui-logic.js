$(document).ready(function() {
	$('#add-class').on('click', function() {
		if (!getCurrentInstructor()) {
			// Change to popover and show
			$('#add-class').attr('data-toggle', 'popover');
			$('#add-class').attr('data-trigger', 'focus');
			$('#add-class').attr('data-html', 'true');
			$('#add-class').attr('data-content', 'Please <b>add</b> and <b>select</b> an instructor using the controllers of the box above before adding a class.');
			$('#add-class').popover('show');
		} else {
			// Change back to modal (BUG HERE (popover shows for a second still) -- gotta fix)
			if ($('#add-class').attr('data-toggle') == 'popover') {
				$('#add-class').popover('destroy');
				$('#add-class').removeAttr('data-trigger');
				$('#add-class').removeAttr('data-html');
				$('#add-class').removeAttr('data-content');
				$('#add-class').attr('data-toggle', 'modal');
			}
		}
	});
});

