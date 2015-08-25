jQuery(document).ready(function() {

    $('#step3-next-btn').on('click', function (){
        insertDepartmentName();
        insertBuildingName();
        insertBuildingHours();
        insertRooms();
        insertInstructors();
    });
    
    $('#summary-back-btn').on('click', function(){
        $('#summary-textarea').text('');//purges all previous data from the textarea
    });

});

function insertDepartmentName(){
    var departmentName = data.stepOne.department;
    $('#summary-textarea').append("Department Name: " +  departmentName);
}

function insertBuildingName() {
    var buildingName = data.stepOne.building;
    $('#summary-textarea').append("\nBuilding Name: " +  buildingName);
    
}
//Function that determines whether the the variable is null
function checkIfNull(checkDay){
    
   if (checkDay === '' || checkDay === null)
       return true;
   
    else
       return false;
}

//Fnction that displays the buiding hours by day in the textarea, if Null prints ot "N/A"
function insertBuildingHours() {
        
         $('#summary-textarea').append("\n\nBuilding Hours:");

         //Check Monday
         var mondayHours = data.stepOne.operatingHours.monOpeningHours + " to " + data.stepOne.operatingHours.monClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.monClosingHours) === false)
             $('#summary-textarea').append("\nMonday: " + mondayHours);
         else
             $('#summary-textarea').append("\nMonday: N/A");
         
         //Check Tuesday
         var tuesdayHours = data.stepOne.operatingHours.tuesOpeningHours + " to " + data.stepOne.operatingHours.tuesClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.tuesClosingHours) === false)
             $('#summary-textarea').append("\nTuesday: " + tuesdayHours);
         else
             $('#summary-textarea').append("\nTuesday: N/A");
        
         //Check Wednesday
         var wednesdayHours = data.stepOne.operatingHours.wedOpeningHours + " to " + data.stepOne.operatingHours.wedClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.wedClosingHours) === false)
             $('#summary-textarea').append("\nWednesday: " + wednesdayHours);
         else
             $('#summary-textarea').append("\nWednesday: N/A");
    
         //Check Thursday
         var thursdayHours = data.stepOne.operatingHours.thursOpeningHours + " to " + data.stepOne.operatingHours.thursClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.thursClosingHours) === false)
             $('#summary-textarea').append("\nThursday: " + thursdayHours);
         else
             $('#summary-textarea').append("\nThursday: N/A");
        
         //Check Friday
         var fridayHours = data.stepOne.operatingHours.friOpeningHours + " to " + data.stepOne.operatingHours.friClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.friClosingHours) === false)
             $('#summary-textarea').append("\nFriday: " + fridayHours);
         else
             $('#summary-textarea').append("\nFriday: N/A");
         
         //Check Saturday
         var saturdayHours = data.stepOne.operatingHours.satOpeningHours + " to " + data.stepOne.operatingHours.satClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.satClosingHours) === false)
             $('#summary-textarea').append("\nSaturday: " + saturdayHours);
          else
             $('#summary-textarea').append("\nSaturday: N/A");
         
         //Check Friday
         var sundayHours = data.stepOne.operatingHours.sunOpeningHours + " to " + data.stepOne.operatingHours.sunClosingHours;
         if (checkIfNull(data.stepOne.operatingHours.sunClosingHours) === false)
             $('#summary-textarea').append("\nSunday: " + sundayHours);
          else
             $('#summary-textarea').append("\nSunday: N/A");
 
    
}

//Function that appends the rooms to the summary textarea

function insertRooms(){
    
    $('#summary-textarea').append("\n\nRooms:");
    for (var i = 0; i < data.stepTwo.rooms.length; i++){
        $('#summary-textarea').append("\n" + data.stepTwo.rooms[i].prefix + " " +  data.stepTwo.rooms[i].number);
    }
    
}

//Function that appends the instructors to the summary textarea

function insertInstructors(){
    
    $('#summary-textarea').append("\n\nInstructors:")
    for (var i = 0; i < data.stepThree.instructors.length; i++){
        $('#summary-textarea').append("\n" + data.stepThree.instructors[i].lastName);
        
    }
    
}