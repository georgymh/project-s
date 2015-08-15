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
        "rooms" : [ ] // array of rooms
    },

    // Step Three: Instructor & Classes Information
    "stepThree" : {
        "instructors" : 
        [   

            // NOTE: this is only an example of how it should look,
            // this should be deleted so that the instructor array have
            // a count of 0. OR, you could create a function on
            // fillDataFromStepThree() that will delete the following
            // object before filling data. I think that will give you the
            // benefit of seeing the structure whenever you want.
            {   
                name : "N/A", // the name of the instructor
                availablePeriods : [], // the periods available (can be more than one)
                classes : 
                [
                    {
                        title: "N/A",               // Ex. History 180
                        credits: "N/A",             // Ex. 3 -- as of 3 credits
                        frequencyPerWeek: "N/A",    // Ex. 2 -- as of twice a week
                        semestrialPeriod: "N/A",    // Ex. full, firstHalf, secondHalf
                                                    // ^ if the class is 16 weeks or 8 weeks.
                    }
                ] // list of classes the instructor teaches
            }
            // ----------------------------------------------------------
        ]
    }
        
};


var instructorData = {
    
    "totalClasses" : "N/A",
    "instructorFirstName" : "N/A",
    "instrucorLastName" : "N/A"
    
};