


/*
    Function that inserts new classes added in Step 3
*/

function insertClass() {
    
     if(document.getElementById('class-title').value === null || document.getElementById('class-title').value === ''){
        //alert("You must enter a room prefix");
    }  else{ 
    var classTitle = document.getElementById("class-title").value;
    var credit = document.getElementById("hours").value;
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
    var classListText = document.createTextNode(classTitle + " " + credit + " " + freq);
    var deleteText = document.createTextNode("×");
    
    //aggregrate new elemenets into one element
    newClassList.appendChild(classListText);
    deleteRoomBtn.appendChild(deleteText);
    newClassList.appendChild(deleteRoomBtn);
    
    var currentClassList = document.getElementById("class-list");
    currentClassList.appendChild(newClassList);
    
    deleteRoomBtn.type = "button";
    deleteRoomBtn.id = "delete-room-btn";
    deleteRoomBtn.onclick = deleteClass;
    
    document.getElementById("class-title").value = '';
    document.getElementById("hours").value = '';
    document.getElementById("frequency").value = '';
    
    totalClass++;
        
    console.log(credit);
    }
    
}


/*
    Function that deletes the class that the user has added in step 2
*/
var deleteClass = function() {
    var listItem = this.parentNode;
    var ul = listItem.parentNode;
    ul.removeChild(listItem);
    
    totalClass--;
}
