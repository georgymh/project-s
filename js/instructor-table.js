/**
 * Plan:
 *
 *      - Save Changes will put all the info into the master JSON inside StepThree.
 *      - On edit, the Instructor from the StepThree inside the JSON will be read (by ID) and the modal will be filled up.
 *      - On delete, the Instructor with the specified ID will be deleted from the master JSON (StepThree).
 */

/* INSIDE INSTRUCTORS:
    [   
        {   
            name : "N/A", // the name of the instructor
            availablePeriods : [], // the periods available (can be more than one)
            classes : 
            [
                {
                    numberOfClasses: "N/A",
                    title: "N/A",               // Ex. History 180
                    credits: "N/A",             // Ex. 3 -- as of 3 credits
                    frequencyPerWeek: "N/A",    // Ex. 2 -- as of twice a week
                    semestrialPeriod: "N/A",    // Ex. full, firstHalf, secondHalf
                                                // ^ if the class is 16 weeks or 8 weeks.
                }
            ] // list of classes the instructor teaches
        }
    ]
 */

jQuery(document).ready(function() {

    $('#save-instructor-changes').on('click', function() {
        saveInstructor();
        console.log(data.stepThree);
        $('#addInstructorModal').modal('hide');
    });

    $('#add-class-btn').on('click', function (){
        insertClass();
    });
    
    $('#addInstructorModal').on('hidden.bs.modal', function () {
        resetSaveInstructorFormData();
    });
    
    $('#instructor-avail-button').on('click', function(){
        $('#instructor-avail').fadeToggle('slow');
         $('#hidden-popover-btn').click();
    });
    
    $(function () {
        $('#instructor-avail').hide();
    });
    
    
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    
    $('#hidden-popover-btn').prop('disabled', true);
});

/**
 * INSTRUCTORS METHODS
 */

/*
    Saves the instructor.

    Checks first if we're saving a new or old instructor.
 */
function saveInstructor() {
    var editingID = $('#instructor-editing-id').val();

    // Decide if we're saving a new instructor or an old one.
    if (editingID.length > 0) {
        // We are editing...
        editInstructor(editingID);
    } else {
        // We are adding a new instructor.
        addInstructor();
    }
    
    // Reset the editing id.
    $('instructor-editing-id').val('');

    // Hide the "No Instructor Added" message.
    $("#instructor-list-msg").hide();
}

/*
    Resets the information in the instructor modal.
 */
function resetSaveInstructorFormData() {
    $("#instructor-first-name").val('');
    $("#instructor-last-name").val('');
    $("#class-list").html('');

    resetClassInfoForm();
}

/*
    Adds a new instructor.
*/
function addInstructor() {
    // First check if name and last name are set.
    if ( ($('#instructor-first-name').val().length > 0) && ($('#instructor-last-name').val().length > 0) ) {

        // Create a hidden textbox with the ID (it will be added on the three lists/columns).
        var uniqueID = guid();
        var uniqueIDHiddenInput = '<input type="hidden" class="' + uniqueID + '" value="' + uniqueID + '"></input>';

        /*
            UI-RELATED ROUTINE FOR INSTRUCTOR TABLE
        */
        
        // Add Instructor Personal Info to Table
        var firstName = $('#instructor-first-name').val();
        var lastName = $('#instructor-last-name').val();
        var instructorPersonalInfo = lastName + ", " + firstName;
        $('#instructor-list').append('<li class="text-center">' + instructorPersonalInfo + uniqueIDHiddenInput + '</li>')

        // Add Quantity of Classes to Table
        var classCount = $('#class-list li').length; // find out how many <li> inside #class-list there are
        $('#number-classes-list').append('<li class="text-center">' + classCount + uniqueIDHiddenInput + '</li>');

        // Add Actions to Table
        var editInstructorBtnElem = '<button type="button" onclick="showModalWithInstructorInfo(this)">Edit</button>';
        var deleteInstructorBtnElem = '<button type="button" onclick="deleteInstructor(this)">×</button>';
        $('#actions-list').append('<li class="text-center">' + editInstructorBtnElem + deleteInstructorBtnElem + uniqueIDHiddenInput + '</li>');
        
        /*
            JSON-RELATED ROUTINE FOR INSTRUCTORS
        */
        var classes = retrieveClassesFromUI();
        var instructorType = retrieveInstructorTypeFromUI();
        fillInstructorsDataWithJSON( uniqueID, firstName, lastName, classes, instructorType );
    }
}

// Helper method to add instructor.
function fillInstructorsDataWithJSON(id, firstName, lastName, classes, type) {
    var instructor = {};
    instructor.firstName = firstName;
    instructor.lastName = lastName;
    instructor.classes = classes;
    instructor.type = type;

    var instructors = data.stepThree.instructors;

    instructors[id] = instructor;
}

// Helper method to add instructor.
function retrieveClassesFromUI() {
    var classList = [];

    $('ul#class-list li').each(function(index, element) {
        var classString = $(element).text();
        var classInfo = classString.split(" - ");

        var title = classInfo[0];
        var hours = parseFloat(classInfo[1]); // to Float...
        var frequency = parseInt(classInfo[2]); // to Int...

        var aClass = {};
        aClass.title = title;
        aClass.hours = hours;
        aClass.frequency = frequency;

        classList.push( aClass );
    });

    return classList;
}

/*
    Shows the modal with a particular instructor information.
*/
var showModalWithInstructorInfo = function (elem) {
    // Show Modal.
    $('#addInstructorModal').modal('show');
    
    // Get correct instructor's information.
    var uniqueID = $(elem).siblings('input[type=hidden]').val();
    var instructorInfo = data.stepThree.instructors[uniqueID];

    // IMPORTANT: Put uniqueID in the hidden textbox to prevent duplication.
    $('#instructor-editing-id').val(uniqueID);

    // Fill out form with the correct info.
    var firstName = instructorInfo.firstName;
    $('#instructor-first-name').val(firstName);

    var lastName = instructorInfo.lastName;
    $('#instructor-last-name').val(lastName);

    var type = instructorInfo.type;
    switch (type) {
        case "parttime":
            $('#part-time-radio').click();
        break;
        case "fulltime":
            $('#full-time-radio').click();
        break;
    }

    fillClassTable(instructorInfo.classes);
}

// Helper method to show modal with instructor info.
function fillClassTable(classes) {
    for(var i = 0; i < classes.length; i++) {
        var title = classes[i].title;
        var hours = classes[i].hours;
        var frequency = classes[i].frequency;
        createClassInUI(title, hours, frequency);  
    }
}

/*
    Edits an instructor's info.
 */
function editInstructor(id) {
    var instructorToEdit = data.stepThree.instructors[id];

    // If the instructor with such ID exists...
    if (typeof(instructorToEdit) != "undefined") {
        // Delete the instructor from the JSON and UI...
        deleteInstructorFromUI(id);
        deleteInstructorFromJSON(id);
    }

    // And then add it again normally!
    addInstructor();
}

/*
    Deletes the Instructor.
*/
var deleteInstructor = function(elem){
    var uniqueID = $(elem).siblings('input[type=hidden]').val();

    /**
    * DELETE FROM JSON
    */
    deleteInstructorFromJSON( uniqueID );

    /**
    * DELETE FROM THE TABLE (UI)
    */
    deleteInstructorFromUI( uniqueID );
}

// Helper method to delete instructor.
function deleteInstructorFromUI(id) {
    var uniqueIDClass = '.' + id; // since the hidden textbox has the ID as its value and class...
    $(uniqueIDClass).each(function() {
        $(this).parent('li').remove();
    });
}

// Helper method to delete instructor.
function deleteInstructorFromJSON(id) {
    var instructors = data.stepThree.instructors;
    delete instructors[id];
}

/**
 *  CLASS METHODS.
 */

/*
    Inserts class into UI.
*/
function insertClass() {
    if ( ($('#class-title').val().length > 0) && ($('#class-hours').val().length > 0) && ($('#class-frequency').val().length > 0) ) {
        var title = $('#class-title').val();
        var hours = $('#class-hours').val();
        var freq = $('#class-frequency').val();

        createClassInUI(title, hours, freq);
        
        resetClassInfoForm();
    }
}

// Helper method to insert class.
function createClassInUI(title, hours, freq) {
    var classInfo = title + " - " + hours + " - " + freq;
    var classActionElem = '<button type="button" class="delete-class-btn" onclick="deleteClass(this)">×</button>';
    $('#class-list').append('<li class="text-center">' + classInfo + classActionElem + '</li>')
    $('#class-list-msg').hide(); // hide the message that says "No Classes Entered"
}

/*
    Deletes class from UI.
*/
var deleteClass = function(elem) {
    var holder_li_element = $(elem).parent('li');
    holder_li_element.remove();
}

/*
    Resets the class form in the UI.
 */
function resetClassInfoForm() {
    $('#class-title').val('');
    $('#class-hours').val('');
    $('#class-frequency').val('');
}

/**
 * HELPER METHODS.
 */

/*
    Function that retrieves instructor type from the UI and returns a string with the type.
*/
function retrieveInstructorTypeFromUI() {
   if(document.getElementById("part-time-radio").checked){
        return 'parttime';
   } else{
        return 'fulltime';
    }
}

/**
 * Unique ID generator.
 */
function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}