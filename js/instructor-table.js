
/*
    Global Variables
*/
var editBool = false;
var editID;
var totalClass = 0;
var u_ID = 0;

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
        
        //add text to list item
        var classListText = document.createTextNode(totalClass);
        newTotalClassList.appendChild(classListText);
        
        //set unique id's
        newTotalClassList.id = u_ID;
        
        var currentTotalClassList = document.getElementById("number-classes-list");
        currentTotalClassList.appendChild(newTotalClassList);
        

        deleteRoomBtn.type = "button";
        deleteRoomBtn.onclick = deleteInstructorInfo;
        
        editInstructorBtn.onclick = editInstructorInfo;
        
        
        /*
            If editBool is equal to true then the user has edited the data, this logic gate will be activated to delete the old user info which 
            will be replaced with the new data
        */
        if (editBool == true){
            document.getElementById(editID).remove();
            document.getElementById(editID).remove();
            document.getElementById(editID).remove();
            document.getElementById(editID).remove();
            editBool = false;
        }
        
        /*
            exits the modal, resets the totalClass count and increases count of the unique id
        */
            totalClass = 0;
            u_ID++;
            $('#myModal-1').modal('hide')

    }
    
}

/*

    Edit instructor information function in Step 3
*/

var editInstructorInfo = function() {
    
    $('#myModal-1').modal('show');
    
    var id = this.id;
    globalID = this.id;
    
    //sets values into variables
    var fName = document.getElementById("instructor-first-name");
    var lName = document.getElementById("instructor-last-name");
    var classes = document.getElementById("class-list");
    var totalClasses = instructorData.classes[id];
    //repopulate lsat and first names into form
    fName.value = document.getElementById(id).innerHTML.split(", ")[1];
    lName.value = document.getElementById(id).innerHTML.split(", ")[0];
    
    //repopulate classes
    for (var i = 0; i < totalClasses.length; i++){
    
        var newList = document.createElement("li");
        newList.class = "text-center";
        var arrayVariables = document.createTextNode(totalClasses[i]);
        newList.appendChild(arrayVariables)
        
        var currentList = document.getElementById("class-list");
        currentList.appendChild(newList);
        totalClass++;
    }
    
    editBool = true;
    editID = this.id;
}

/*
    Function that deletes the instructor info in step 3, uses the unique id to delete items
*/
var deleteInstructorInfo = function(){
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();
     document.getElementById(this.id).remove();
}

/*
    function that stores the class data for each instructor into an JSON array
*/
function storeClasses() {
    var uls = document.getElementById("class-list");
    var lis = uls.getElementsByTagName('li');
    var classArray = [];
    for (var i = 0; i < lis.length; i++){
        var test = lis[i].innerHTML.split("<")[0];
        classArray.push(test);
    }
    instructorData.classes.push(classArray);
}