
/*
    Function that sets the user data in step 1, converts data into JSON schema
*/
function setDepartmentData() {
    
        userData.department = document.getElementById("department-name").value;
        userData.building = document.getElementById("building-name").value;
    
        //Hours Available Data
        userData.monOpeningHours =  document.getElementById("monday-starting-hours").value;
        userData.monClosingHours = document.getElementById("monday-ending-hours").value;
        userData.tuesOpeningHours = document.getElementById("tuesday-starting-hours").value;
        userData.tuesClosingHours = document.getElementById("tuesday-ending-hours").value;
        userData.wedOpeningHours = document.getElementById("wednesday-starting-hours").value;
        userData.wedClosingHours = document.getElementById("wednesday-ending-hours").value;
        userData.thursOpeningHours = document.getElementById("thursday-starting-hours").value;
        userData.thursClosingHours = document.getElementById("thursday-ending-hours").value;
        userData.friOpeningHours = document.getElementById("friday-starting-hours").value;
        userData.friClosingHours = document.getElementById("friday-ending-hours").value;
        userData.satOpeningHours = document.getElementById("saturday-starting-hours").value;
        userData.satClosingHours = document.getElementById("saturday-ending-hours").value;
        userData.sunOpeningHours = document.getElementById("sunday-starting-hours").value;
        userData.sunClosingHours = document.getElementById("sunday-ending-hours").value;
    
        alert(userData.monClosingHours);//check data integrity
                
}

/*
    Function that deletes the rooms that the user has added in step 2
*/

var deleteButton = function(){
    var listItem = this.parentNode;
    var ul = listItem.parentNode;
    
    ul.removeChild(listItem);
}

/*
    Function that insert new room and prefix in step-well 2
*/
function insertRoom() {
					
                    if(document.getElementById('room-prefix').value === null || document.getElementById('room-prefix').value === ''){
						alert("You must enter a room prefix");
					}
					else if(document.getElementById('room-number').value === null || document.getElementById('room-number').value === ''){
						alert("You must enter a room");
					}
                    
					else{	
                            var roomPrefix = document.getElementById("room-prefix").value;
                            var roomNumber = document.getElementById("room-number").value;

                        
							document.getElementById("rooms-entered").innerHTML = '';
                        
                            var newList = document.createElement("li");
                            var deleteRoom = document.createElement("button");
                            var listText = document.createTextNode(roomPrefix + " " + roomNumber + "  ");
                            var deleteText = document.createTextNode("remove");
                            newList.appendChild(listText); //add the text node to the newly created li
                            deleteRoom.appendChild(deleteText);
                            newList.appendChild(deleteRoom);
                        
                            var currentList = document.getElementById("room-list");
                            currentList.appendChild(newList);
                            
                            //deletes the added room
                            deleteRoom.onclick = deleteButton;
                            
                            //Sets the text boxes value back to null
                            document.getElementById("room-prefix").value = '';
                            document.getElementById("room-number").value = '';
                            
                          
                            
						}
    
    
}

/*
    Function that saves the user's input in step 2 when the next button is clicked
*/

function saveRoomData() {
    
     //stores the data that the user into an array
     var rooms = document.getElementById("room-list");
     var totalRooms = rooms.getElementsByTagName("li");
     var arrayR = [];
     
     for (var i = 0; i < totalRooms.length; i++){
      var roomData = totalRooms[i].innerHTML.split("<")[0];
      arrayR.push(roomData); 
         
     }
     
     alert(arrayR[0]); //function to check data integrity
    
}



  
    

