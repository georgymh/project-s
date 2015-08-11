  
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

        var allow_submit = true;

        if ( allow_submit ) {

        	console.log('submitting...');
            
            $.ajax({
                type: "POST",
                url: "registeraccounts.php",
                data: formData,
                success: __handleSubmit,
                complete: function () {

                }
            });
        }
    });

});

var __handleSubmit = function HandleSubmit(replyObj) {
    if (replyObj == 1) {
        //showSuccessMessage();
    } else {
        //showErrorAlert(replyObj);
    }

    //console.log(replyObj);
};

function getCurrentStep() {
    if ( $('#step-one').is(":visible") ) {
        return $('#step-one'); // step 1

    } else if ( $('#step-two').is(":visible") ) {
        return $('#step-two'); // step 2

    } else if ( $('#step-three').is(":visible") ) {
        return $('#step-three'); // step 3

    } else if ( $('#step-four').is(":visible") ) {
        return $('#step-four'); // step 4

    } else {
        return null; // unknown
        console.log("ERROR: erroneous step!!! Don't let this bug spread.")
    }
}


