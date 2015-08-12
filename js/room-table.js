jQuery(document).ready(function() {

    $('#add-room-btn').on('click', function() {
        insertRoom();
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
    if(document.getElementById('room-prefix').value === null || document.getElementById('room-prefix').value === ''){
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
        document.getElementById("room-prefix").value = '';
        document.getElementById("room-number").value = '';        
    }    
}

/*
    Function that inserts new classes added in Step 3
*/

function insertClass() {
    
     if(document.getElementById('class-title').value === null || document.getElementById('class-title').value === ''){
        //alert("You must enter a room prefix");
    }  else{ 
    var classTitle = document.getElementById("class-title").value;
    var credit = document.getElementById("credits").value;
    var freq = document.getElementById("frequency").value;
    
    //reset all values
    document.getElementById("classes-entered").innerHTML = '';
    document.getElementById("credits").value;
    document.getElementById("frequency").value;
    
    //create new list element
    var newClassList = document.createElement("li");
    newClassList.class = "text-center";
    
    var deleteRoomBtn = document.createElement("button");
    var classListText = document.createTextNode(classTitle + "/" + credit + "/" + freq);
    var deleteText = document.createTextNode("×");
    
    
    newClassList.appendChild(classListText);
    deleteRoomBtn.appendChild(deleteText);
    newClassList.appendChild(deleteRoomBtn);
    
    var currentClassList = document.getElementById("class-list");
    currentClassList.appendChild(newClassList);
    
    deleteRoomBtn.type = "button";
    deleteRoomBtn.id = "delete-room-btn";
    deleteRoomBtn.onclick = deleteRoom;
    
    document.getElementById("class-title").value = '';
    console.log(credit);
    }
    
}



