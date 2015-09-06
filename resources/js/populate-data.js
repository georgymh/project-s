function runCorrectDataFiller( step ) {
    switch (step) {
    case "step-one":
        fillDataFromStepOne();
    break;
    case "step-two":
        fillDataFromStepTwo();
    break;
    default:
        console.log("incorrect step gotten!");
    }
}

/*
    Function that sets the user data in step 1, converts data into JSON schema
*/
function fillDataFromStepOne() {
    // RESET DATA FIRST
    resetStepOneData();

    // Set department and building name.
    data.department = $("#department-name").val();
    data.building = $("#building-name").val();

    // Get all hours information from the DOM and put into 'hours' array.
    // NOTE: to get the starting and ending hours we assume that the times are ordered
    // from Monday to Sunday.
    var hours = [];
    $('#step-one').find('.days-checkbox').each(function() { // runs seven times...
        if ($(this).is(':checked')) {
            hours.push( getStartingHoursTextField( this ).val() );
            hours.push( getEndingHoursTextField( this ).val() );
        } else {
            hours.push( '' ); // put empty string for start
            hours.push( '' ); // put empty string for end
        }
    });

    // Put hours into each day of week inside main JSON object.
    var operatingHours = data.operatingHours;
    $.each( daysOfWeek, function( index, value ){
        operatingHours[value].push( hours[ index * 2 ] );
        operatingHours[value].push( hours[ (index * 2) + 1] );
    });

    // Perform some testing.
    console.log("Logging step one data: \n");
    logTheFullJSONObject();   
}

/*
    Function that saves the user's input in step 2 when the next button is clicked
*/

function fillDataFromStepTwo() {
    // Get room data from UI and put into roomArray.
    var roomArray = [];
    var rooms = $('#room-list');
    rooms.find('.roomPrefix').each(function() {
        var prefix = $(this).text();
        var number = parseInt($(this).siblings('.roomNumber').text());

        var tempObj = {};
        tempObj.prefix = prefix;
        tempObj.number = number;

        roomArray.push(tempObj);
    });

    // Put data into the JSON object
    data.rooms = roomArray;

    // Perform some testing.
    console.log("Logging step two data: \n");
    logTheFullJSONObject();
}

// For testing and debugging purposes.
function logTheFullJSONObject() {
    console.log(data);
}

function resetStepOneData() {
    data.department = '';
    data.building = '';
    data.operatingHours = {
        "monday" : [ ],
        "tuesday" : [ ],
        "wednesday" : [ ],
        "thursday" : [ ],
        "friday" : [ ],
        "saturday" : [ ],
        "sunday" : [ ]
    };
}