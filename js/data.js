var data = {

    // Step One: Department Information
    "stepOne" : {
        "department" : "N/A",
        "building" : "N/A", 
        "operatingHours": {
                monOpeningHours : "N/A",
                monClosingHours : "N/A",
                tuesOpeningHours : "N/A",
                tuesClosingHours : "N/A",
                wedOpeningHours : "N/A",
                wedClosingHours : "N/A",
                thursOpeningHours : "N/A",
                thursClosingHours : "N/A",
                friOpeningHours : "N/A",
                friClosingHours : "N/A",
                satOpeningHours : "N/A",
                satClosingHours : "N/A",
                sunOpeningHours : "N/A",
                sunClosingHours : "N/A",   
        }
    },

    // Step Two: Room Information
    "stepTwo" : {
        "rooms" : [] // array of rooms
    },
    
    // Step Three: Instructor & Classes Information
    "stepThree" : {
        "instructors" : 
        [   
             {   
                 firstName : "N/A", // the name of the instructor
                 lastName : "N/A",
                 type : "N/A",
                 availablePeriods : [], // the periods available (can be more than one)
                 classes : [] // classes the instructor teaches
             }
        ]
    }
    
};

var classes = [
                 {
                     id: "N/A",
                     title: "N/A",               // Ex. History 180
                     frequencyPerWeek: "N/A",    // Ex. 2 -- as of twice a week
                     semestrialPeriod: "N/A",    // Ex. full, firstHalf, secondHalf
                                                 // ^ if the class is 16 weeks or 8 weeks.
                 }
];


 var instructorData = {
    
    "totalClasses" : "N/A",
    "instructorFirstName" : "N/A",
    "instructorLastName" : "N/A",
    "instructorTypeArray" : [],
    "classes": []
     
 };
