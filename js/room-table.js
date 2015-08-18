


jQuery(document).ready(function() {

    $('#add-room-btn').on('click', function() {
        insertRoom();
    });

});

jQuery(document).ready(function() {
     $('#save-instructor-changes').on('click', function() {
        storeClasses();
     });
});


jQuery(document).ready(function() {
    $('#save-instructor-changes').on('click', function() {
        insertInstructor();
    });
    
});

jQuery(document).ready(function() {
    $('#save-instructor-changes').on('click', function() {
        storeInstructorType();
       
    });
    
});
jQuery(document).ready(function() {
    $('#close-instructor-changes').on('click', function() {
        document.getElementById("class-list").innerHTML = '';
        document.getElementById("classes-entered").innerHTML = '';
        document.getElementById("instructor-first-name").value = '';
        document.getElementById("instructor-last-name").value = '';
        document.getElementById("class-title").value = '';
        editBool = false;
        totalClass = 0;
    });
    
});

jQuery(document).ready(function() {
    $('#add-class-btn').on('click', function (){
        insertClass();
    });
    
});


jQuery(document).ready(function() {
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

/*
    Function that deletes the rooms that the user has added in step 2
*/

var deleteRoom = function() {
    var listItem = this.parentNode;
    var ul = listItem.parentNode;
    ul.removeChild(listItem);
}


/*
    Function that inserts new room and prefix in step-well 2
*/
function insertRoom() {     
    if(document.getElementById('room-prefix').value == null || document.getElementById('room-prefix').value == ''){
        //alert("You must enter a room prefix");
    } else if(document.getElementById('room-number').value === null || document.getElementById('room-number').value === ''){
        //alert("You must enter a room");
    } else{ 
        var roomPrefix = document.getElementById("room-prefix").value;
        var roomNumber = document.getElementById("room-number").value;

        document.getElementById("rooms-entered").innerHTML = '';
    
        var newList = document.createElement("li");
        newList.class = "text-center";

        var deleteRoomBtn = document.createElement("button");
        var listText = document.createTextNode(roomPrefix + " " + roomNumber);
        var deleteText = document.createTextNode("×");

        newList.appendChild(listText); //add the text node to the newly created li
        deleteRoomBtn.appendChild(deleteText);
        newList.appendChild(deleteRoomBtn);
    
        var currentList = document.getElementById("room-list");
        currentList.appendChild(newList);
        
        deleteRoomBtn.type = "button";
        deleteRoomBtn.id = "delete-room-btn";
        deleteRoomBtn.onclick = deleteRoom;
        
        //Sets the text boxes value back to null
        document.getElementById("room-number").value = '';        
    }    
}













