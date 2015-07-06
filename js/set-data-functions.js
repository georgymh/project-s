


//function that sets the user data
function setDepartmentData() {
    
        userData.department = document.getElementById("deptName").value;
        userData.building = document.getElementById("bldgName").value;
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

function insertRoom() {
					
                    if(document.getElementById('addPrefix').value === null || document.getElementById('addPrefix').value === ''){
						alert("You must enter a prefix");
					}
					else if(document.getElementById('addRoom').value === null || document.getElementById('addRoom').value === ''){
						alert("You must enter a room");
					}
                    
					else{	
							
							var table = document.getElementById("room-table");
							var row = table.insertRow(0);
							var cell = row.insertCell(0);
							var newRoom = document.getElementById("addRoom").value;
                            var newPrefix = document.getElementById("addPrefix").value;
							cell.innerHTML = newPrefix + " " + newRoom;
							document.getElementById('addRoom').value = null;
                            document.getElementById('addPrefix').value = null;
							$("#no-rooms").hide();
							$("#delete-button").show();
							
						}
					}
					
function deleteRoom(){
				document.getElementById("room-table").deleteRow(0);
}
					
$("#delete-button").hide();