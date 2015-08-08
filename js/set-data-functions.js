


//function that sets the user data
function setDepartmentData() {
    
        userData.department = document.getElementById("deptName").value;
        userData.building = document.getElementById("bldgName").value;
    
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
    
        
                
}

var deleteButton = function(){
    var listItem = this.parentNode;
    var ul = listItem.parentNode;
    
    ul.removeChild(listItem);
    
    
}
//Function that insert new room and prefix in step-well 2
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
					

					


