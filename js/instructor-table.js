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


/*
    Global Variables
*/
var editBool = false;
var editID;
var totalClass = 0;
var u_ID = 0;

var classID = 0;

jQuery(document).ready(function() {

    $('#add-room-btn').on('click', function() {
        insertRoom();
    });

    $('#save-instructor-changes').on('click', function() {
        insertInstructor();
        storeInstructorType();  
        console.log('saving changes...');
        saveInstructorToJSON();
        document.getElementById("class-list").innerHTML = '';
        document.getElementById("classes-entered").innerHTML = '';
        document.getElementById("instructor-first-name").value = '';
        document.getElementById("instructor-last-name").value = '';
        document.getElementById("class-title").value = '';
    });

    $('#close-instructor-changes').on('click', function() {
        document.getElementById("class-list").innerHTML = '';
        document.getElementById("classes-entered").innerHTML = '';
        document.getElementById("instructor-first-name").value = '';
        document.getElementById("instructor-last-name").value = '';
        document.getElementById("class-title").value = '';
        editBool = false;
        totalClass = 0;
    });

    $('#add-class-btn').on('click', function (){
        insertClass();
    });
    
    // Add instructor modal.
    $('#myModal-1').on('hidden.bs.modal', function () {
        document.getElementById("class-list").innerHTML = '';
        document.getElementById("class-title").value = '';
        document.getElementById("classes-entered").innerHTML = '';
        document.getElementById("instructor-first-name").value = '';
        document.getElementById("instructor-last-name").value = '';
        editBool = false;
        totalClass = 0;
    });

});


function saveInstructorToJSON() {
    insertInstructor();
}


/*
    Function that sets instructor data from modal into the step 3 form
*/

function insertInstructor() {
     if(document.getElementById("instructor-first-name").value === null || document.getElementById("instructor-first-name").value === ''){
        //alert("You must enter a room prefix");
    }  
    else if(document.getElementById("instructor-last-name").value === null || document.getElementById("instructor-last-name").value === ''){
        //alert("You must enter a room");
    }
    else{ 
        
        //sets values into variables
        var firstName = document.getElementById("instructor-first-name").value;
        var lastName = document.getElementById("instructor-last-name").value;
        var adjunct = document.getElementById("adjunct-radio").value;
        var fullTime = document.getElementById("full-time-radio").value;
        
        
        //reset user input
        document.getElementById("classes-entered").innerHTML = '';
        document.getElementById("instructor-first-name").value = '';
        document.getElementById("instructor-last-name").value = '';
        document.getElementById("class-list").innerHTML = "";
      
        /*
            Append Instructor info
        */
        
        //create new instructor list element
        var newClassList = document.createElement("li");
        newClassList.class = "text-center";
        
        //add text to list item
        var classListText = document.createTextNode(lastName + ", " + firstName);
        newClassList.appendChild(classListText); 
        
        //set unique u_ID
        newClassList.id = u_ID;
        
        //append text node to new list item
        var currentClassList = document.getElementById("instructor-list");
        currentClassList.appendChild(newClassList);
        
        //create new action list element
        var newActionList = document.createElement("li");
        newActionList.class = "text-center";
        
        //create new list item for edit button
        var newEditList = document.createElement("li");
        newEditList.class = "text-center";
        
        //create edit button and append
        var editInstructorBtn = document.createElement("button");
        var editInstructor = document.createTextNode("edit");
        editInstructorBtn.appendChild(editInstructor);
        newEditList.appendChild( editInstructorBtn );
        
        //set unique Id
        newEditList.id = u_ID;
        
        //ad edit button to actions list
        var currentEditList = document.getElementById("actions-list");
        //currentEditList.appendChild(newEditList);
        
        //create new delete button to be appended
        var deleteRoomBtn = document.createElement("button");
        var deleteText = document.createTextNode("×");
        deleteRoomBtn.appendChild(deleteText);
        newActionList.appendChild(editInstructorBtn);
        newActionList.appendChild(deleteRoomBtn);
        
        //set unique id's
        deleteRoomBtn.id =  u_ID;
        editInstructorBtn.id = u_ID;
        
        var currentActionList = document.getElementById("actions-list");
        currentActionList.appendChild(newActionList);
        
        //create new total class list element
        var newTotalClassList = document.createElement("li");
        newTotalClassList.class = "text-center";
        
        //add text to list item (Class Count)
        var classListText = document.createTextNode(totalClass);
        newTotalClassList.appendChild(classListText);
        
        //set unique id's
        newTotalClassList.id = u_ID;
        
        var currentTotalClassList = document.getElementById("number-classes-list");
        currentTotalClassList.appendChild(newTotalClassList);
        

        deleteRoomBtn.type = "button";
        deleteRoomBtn.onclick = deleteInstructorInfo;
        
        editInstructorBtn.onclick = editInstructorInfo;
        editInstructorBtn.type = "button";
        
        /*
            If editBool is equal to true then the user has edited the data, this logic gate will be activated to delete the old user info which 
            will be replaced with the new data
        */
        if (editBool == true){

            document.getElementById(editID).remove();
            document.getElementById(editID).remove();
            document.getElementById(editID).remove();
            document.getElementById(editID).remove();

            deleteInstructorFromJSON(editID);
            
            editBool = false;
        }

        fillInstructorsWithJSON( u_ID, firstName, lastName, retrieveInstructorType() );
        data.stepThree.instructors[u_ID].classes = classes;
        resetClassesJSON();
        
        /*
            exits the modal, resets the totalClass count and increases count of the unique id
        */
            u_ID++;
            $('#myModal-1').modal('hide')
    }
    
}

function fillInstructorsWithJSON(id, firstName, lastName, type) {
    var instructor = {};
    instructor.firstName = firstName;
    instructor.lastName = lastName;
    instructor.type = type;
    // Extra
    instructor.classes = classes;

    var instructors = data.stepThree.instructors;

    instructors[u_ID] = instructor;
}

function resetClassesJSON() {
    classes = [];
    classID = 0;
}

/*

    Edit instructor information function in Step 3
*/

var editInstructorInfo = function () {
    
    $('#myModal-1').modal('show');
    
    var id = this.id;
    editID = this.id;
    var instructorObject = data.stepThree.instructors[id];
    
    //sets values into variables
    document.getElementById("instructor-first-name").value = instructorObject.firstName;
    document.getElementById("instructor-last-name").value = instructorObject.lastName;

   
   var classArray = instructorObject.classes;
   fillModalClasses(classArray);
    
   if (instructorObject.type == "adjunct"){
       document.getElementById("adjunct-radio").click();
   
    }
    else{
        document.getElementById("full-time-radio").click();

    }
    editBool = true;
    classes = instructorObject.classes;
    classID = instructorObject.classes.length;
}

function fillModalClasses(classArr){
 
    for (var i = 0; i < classArr.length; i++){
        
        var classTitle = classArr[i].title;
        var hours = classArr[i].hours;
        var freq = classArr[i].frequency;
        

        //create new list element
        var newClassList = document.createElement("li");
        newClassList.class = "text-center";
        
        //create new elements to be appended
        var deleteRoomBtn = document.createElement("button");

        // Transform variables into text HERE.
        
        var classListText = document.createTextNode(classTitle + " " + hours + " " + freq);
        var deleteText = document.createTextNode("×");
        
        //aggregrate new elemenets into one element
        newClassList.appendChild(classListText);
        deleteRoomBtn.appendChild(deleteText);
        newClassList.appendChild(deleteRoomBtn);

        // Create hidden textbox with ID.
        var idHiddenBox = document.createElement("input");
        idHiddenBox.type = "hidden";
        idHiddenBox.value = classID;
        idHiddenBox.id = classID;
        newClassList.appendChild( idHiddenBox );
        
        var currentClassList = document.getElementById("class-list");
        currentClassList.appendChild(newClassList);
        
        deleteRoomBtn.type = "button";
        deleteRoomBtn.id = "delete-room-btn";
        deleteRoomBtn.onclick = deleteClass;
        classID++;
        totalClass++;
        
    }
    
}

/*
    Function that deletes the instructor info in step 3, uses the unique id to delete items
*/
var deleteInstructorInfo = function(){
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();

     deleteInstructorFromJSON(this.id);
}

function deleteInstructorFromJSON(id) {
    var instructors = data.stepThree.instructors;
    instructors.splice( )
}


/**
 *  CLASS METHODS.
 */

/*
    Function that deletes the class in the UI that the user has added in step 2
*/
var deleteClass = function() {
    var listItem = this.parentNode;
    var ul = listItem.parentNode;
    ul.removeChild(listItem);
    
    var id = $(this).siblings('input').val(); // the magic touch.
    deleteClassFromJSONData(id);
}

function deleteClassFromJSONData(id) {

    classes[id].title = '1';
    
    //shift array
    var newClasses = []
    for (var i = 0; i < classes.length; i++){
        
        if (classes[i].title != '1'){
           // alert(classes[i].title);
            newClasses.push(classes[i]);
        }
    }
    classes = newClasses;
    totalClass--;
}

/*
    Function that inserts new classes added in Step 3
*/
function insertClass() {
    
    if(document.getElementById('class-title').value === null || document.getElementById('class-title').value === ''){
        //alert("You must enter a room prefix");
    } else {
        var classTitle = document.getElementById("class-title").value;
        var hours = document.getElementById("hours").value;
        var freq = document.getElementById("frequency").value;
        
        //reset all values
        document.getElementById("instructor-classes").innerHTML = '';
        document.getElementById("hours").value;
        document.getElementById("frequency").value;
            
        //create new list element
        var newClassList = document.createElement("li");
        newClassList.class = "text-center";
        
        //create new elements to be appended
        var deleteRoomBtn = document.createElement("button");

        // Transform variables into text HERE.
        
        var classListText = document.createTextNode(classTitle + " " + hours + " " + freq);
        var deleteText = document.createTextNode("×");
        
        //aggregrate new elemenets into one element
        newClassList.appendChild(classListText);
        deleteRoomBtn.appendChild(deleteText);
        newClassList.appendChild(deleteRoomBtn);

        // Create hidden textbox with ID.
        var idHiddenBox = document.createElement("input");
        idHiddenBox.type = "hidden";
        idHiddenBox.value = classID;
        idHiddenBox.id = classID;;
        newClassList.appendChild( idHiddenBox );
        
        var currentClassList = document.getElementById("class-list");
        currentClassList.appendChild(newClassList);
        
        deleteRoomBtn.type = "button";
        deleteRoomBtn.id = "delete-room-btn";
        deleteRoomBtn.onclick = deleteClass;
        
        document.getElementById("class-title").value = '';
        document.getElementById("hours").value = '';
        document.getElementById("frequency").value = '';

        fillClassesWithJSON(classID, classTitle, hours, freq);
        classID++;
    }
}

function fillClassesWithJSON(id, title, hours, frequency) {    
    var aClass = {};
    aClass.title = title;
    aClass.hours = hours;
    aClass.frequency = frequency;
    classes[id] = aClass;
    totalClass++;
}

/*
    function that stores instructor type
*/
function retrieveInstructorType() {
    var adjunctRadio = document.getElementById("adjunct-radio");
    var fullTimeRadio = document.getElementById("full-time-radio");

   if(document.getElementById("adjunct-radio").checked){
        return 'adjunct';
   } else{
        return 'fulltime';
    }
}








