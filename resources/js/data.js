var data = {

    // Step One: Department Information
    "department" : "",
    "building" : "",
    // Operating Hours contains the hours the department in general will be open or close
    // on each day. Each day has an array that will contain two strings that represent this data.
    // In case the department does not open at a certain day, the two strings will be empty.
    "operatingHours": 
    {
        "monday" : [ ],
        "tuesday" : [ ],
        "wednesday" : [ ],
        "thursday" : [ ],
        "friday" : [ ],
        "saturday" : [ ],
        "sunday" : [ ]
    },

    // Step Two: Room Information
    "rooms" : 
    [   // NOTE: The lines below are just for informational purposes.
        // { 
        //     "prefix" : '',
        //     "number" : ''
        // }
    ]   // array of room objects
};

var daysOfWeek = [
    "monday",
    "tuesday",
    "wednesday",
    "thursday",
    "friday",
    "saturday",
    "sunday"                
];