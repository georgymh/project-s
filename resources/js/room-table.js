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

    // Update the total rooms count
    var totalRoomElem = $('#room-count');
    var num = parseInt($.trim($(totalRoomElem).html()));
    $(totalRoomElem).html(--num);
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

        var listContent = '<span class="roomPrefix">' + roomPrefix + '</span> <span class="roomNumber">' + roomNumber + '</span>';
        $(newList).append(listContent); //add the text node to the newly created li

        var deleteRoomBtn = document.createElement("button");
        var deleteText = document.createTextNode("×");
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

    // Update the total rooms count
    var totalRoomElem = $('#room-count');
    var num = parseInt($.trim($(totalRoomElem).html()));
    $(totalRoomElem).html(++num);
}
