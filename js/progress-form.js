  
jQuery(document).ready(function() {
   /*
        Form
    */
   
   	// Hide all steps.
   	$('#main-form').find('fieldset').each(function() {
   		$(this).hide();
   	});

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
    $('form').on('submit', function(e) {
        e.preventDefault();

        var allow_submit = true;

        if ( allow_submit ) {
            
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





	// $(document).ready(function(){
	// 	var current = 1;
		
	// 	widget      = $(".step");
	// 	btnnext     = $(".next");
	// 	btnback     = $(".back"); 
	// 	btnsubmit   = $(".submit");

	// 	// Init buttons and UI
	// 	widget.not(':eq(0)').hide();
	// 	hideButtons(current);
	// 	setProgress(current);

	// 	// Next button click action
	// 	btnnext.click(function(){
	// 		if(current < widget.length){
	// 			widget.show();
	// 			widget.not(':eq('+(current++)+')').hide();
	// 			setProgress(current);
	// 		}
	// 		hideButtons(current);
	// 	})

	// 	// Back button click action
	// 	btnback.click(function(){
	// 		if(current > 1){
	// 			current = current - 2;
	// 			btnnext.trigger('click');
	// 		}
	// 		hideButtons(current);
	// 	})			
	// });

	// // Change progress bar action
	// setProgress = function(currstep){
	// 	var percent = parseFloat(100 / widget.length) * currstep;
	// 	percent = percent.toFixed();
	// 	$(".progress-bar").css("width",percent+"%").html(percent+"%");		
	// }

	// // Hide buttons according to the current step
	// hideButtons = function(current){
	// 	var limit = parseInt(widget.length); 

	// 	$(".action").hide();

	// 	if(current < limit) btnnext.show();
	// 	if(current > 1) btnback.show();
	// 	if (current == limit) { btnnext.hide(); btnsubmit.show(); }
	// }
 //  var _gaq = _gaq || [];
 //  _gaq.push(['_setAccount', 'UA-19096935-1']);
 //  _gaq.push(['_trackPageview']);

 //  (function() {
 //    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
 //    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 //    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 //  })();
