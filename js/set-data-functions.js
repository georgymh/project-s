function runCorrectDataFiller( step ) {
    switch (step) {
    case "step-one":
        fillDataFromStepOne();
    break;
    case "step-two":
        fillDataFromStepTwo();
    break;
    case "step-three":
        fillDataFromStepThree();
    break;
    case "step-four":
        fillDataFromStepFour();
    break;
    default:
        console.log("incorrect step gotten!");
    }
}

/*
    Function that sets the user data in step 1, converts data into JSON schema
*/
function fillDataFromStepOne() {
    
    var stepOneData = data.stepOne;

    stepOneData.department = document.getElementById("department-name").value;
    stepOneData.building = document.getElementById("building-name").value;

    var operatingHours = stepOneData.operatingHours;

    //Hours Available Data
    operatingHours.monOpeningHours =  document.getElementById("monday-starting-hours").value;
    operatingHours.monClosingHours = document.getElementById("monday-ending-hours").value;
    operatingHours.tuesOpeningHours = document.getElementById("tuesday-starting-hours").value;
    operatingHours.tuesClosingHours = document.getElementById("tuesday-ending-hours").value;
    operatingHours.wedOpeningHours = document.getElementById("wednesday-starting-hours").value;
    operatingHours.wedClosingHours = document.getElementById("wednesday-ending-hours").value;
    operatingHours.thursOpeningHours = document.getElementById("thursday-starting-hours").value;
    operatingHours.thursClosingHours = document.getElementById("thursday-ending-hours").value;
    operatingHours.friOpeningHours = document.getElementById("friday-starting-hours").value;
    operatingHours.friClosingHours = document.getElementById("friday-ending-hours").value;
    operatingHours.satOpeningHours = document.getElementById("saturday-starting-hours").value;
    operatingHours.satClosingHours = document.getElementById("saturday-ending-hours").value;
    operatingHours.sunOpeningHours = document.getElementById("sunday-starting-hours").value;
    operatingHours.sunClosingHours = document.getElementById("sunday-ending-hours").value;

    console.log("Logging step one data: \n");
    console.log(stepOneData); //check data integrity

    logTheFullJSONObject();   
}

/*
    Function that saves the user's input in step 2 when the next button is clicked
*/

function fillDataFromStepTwo() {
    
    // stores the data that the user into an array
    var rooms = document.getElementById("room-list");
    var totalRooms = rooms.getElementsByTagName("li");
    var roomArray = [];
     
    for (var i = 0; i < totalRooms.length; i++){
        var roomData = totalRooms[i].innerHTML.split("<")[0];
        roomArray.push(roomData);    
    }
    
    // Put data into the JSON object
    var stepTwoData = data.stepTwo;

    stepTwoData.rooms = roomArray;

    console.log("Logging step two data: \n");
    console.log(stepTwoData); //check data integrity

    logTheFullJSONObject();
}

function fillDataFromStepThree() {
    
    logTheFullJSONObject();
   
    console.log('filling data for step 3');
    
}

// For testing and debugging purposes.
function logTheFullJSONObject() {
    console.log(data);
}

