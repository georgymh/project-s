  jQuery(document).ready(function() {
   /*
        Form
    */

   	// Animation to show FIRST step.
    $('#main-form fieldset:first-child').fadeIn('slow');
    
    // next step
    $('.next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');

        var next_step = true;
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                $(this).next().fadeIn();
            });
        }

        // Run respective JSON-populating routine.
        var currentStepId = getCurrentStep().attr('id');
        runCorrectDataFiller( currentStepId );
    });
    
    // previous step
    $('.back').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');

        parent_fieldset.fadeOut(400, function() {
            $(this).prev().fadeIn();
        });
    });
    
    // submit
    $('#main-form').on('submit', function(e) {
        e.preventDefault();

        // Run respective JSON-populating routine.
        var currentStepId = getCurrentStep().attr('id');
        runCorrectDataFiller( currentStepId );

        var allow_submit = true; // for future validation.
        if ( allow_submit ) {
        	console.log('submitting...');
    
            $.ajax({
                method: 'POST',
                url: 'createschedule.php',
                data: { "data" : JSON.stringify(data) },
                success: function(data) {
                    console.log(data);
                    window.location.href = '.';
                }
            });
        }
    });

});

function getCurrentStep() {
    if ( $('#step-one').is(":visible") ) {
        return $('#step-one'); // step 1
    } else if ( $('#step-two').is(":visible") ) {
        return $('#step-two'); // step 2
    } else {
        return null; // unknown
        console.log("ERROR: erroneous step!!! Don't let this bug spread.")
    }
}