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

function addMetaDataToDraggableEvent(draggableEvent, classId, eventId) {
	// store data so the calendar knows to render an event upon drop
	$(draggableEvent).data('event', {
		title: $.trim($(draggableEvent).find('.title').text()), // use the element's text as the event title
		instructor: $('#current-instructor').text(),
		duration: $(draggableEvent).find('.duration').text(),

		class_id: classId,
		eventData_id: eventId,

		stick: true // maintain when user navigates (see docs on the renderEvent method)
	});
}

function enableDraggability() {
	/* initialize the external events
	-----------------------------------------------------------------*/

	$('#class-inner-box .fc-event').each(function() {

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0,  //  original position after the drag

			// these set of options are to allow the dedired effect
			// inside the scrollable div created in #class-inner-box:
			appendTo: 'body',
			scroll: false,
			helper: 'clone',
			containment: 'window',

			// these are just for the looks:
			start: function(e, ui) {
				$(ui.helper).addClass("fc-event-clone");
			}
		});

	});
}

