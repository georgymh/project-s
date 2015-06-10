/*
	Georgy Marrero.
	June 2, 2015.
*/

#ifndef ROOM_H_
#define ROOM_H_

#include <string>
#include <map>

#include "Interval.h"

using namespace std;

/**
* Enum type "Days" that contains the 7 days of the week.
*
* Note: It is declared globally because it might be used by other classes.
*/
enum Days
{
	Monday		= 1,
	Tuesday		= 2,
	Wednesday	= 3,
	Thursday	= 4,
	Friday		= 5,
	Saturday	= 6,
	Sunday		= 7
};

/*
* This class represents a room inside a building.
*/
class Room
{
public:
	// Constructors
	Room();
	Room(string prefix, int roomNumber);

	// Getters
	string getPrefix() const;
	int getRoomNumber() const;
	static string getBuildingName();
	static map<Days, bool> getDaysOpened();
	static map<Days, Interval> getHoursOpened();

	// Setters
	void setPrefix(string newPrefix);
	void setRoomNumber(int newRoomNumber);
	static void setBuildingName(string newBuildingName);
	static void setDaysOpened(map<Days, bool> newDaysOpened);
	static void setHoursOpened(map<Days, Interval> newHoursOpened);

	// Print
	void print();

private:
	/**
	* Static string that contains the name of the building that has all the rooms.
	*
	* Note: This variable is static so that you can return the building name from
	* any instance of the Room class.
	*/
	static string buildingName;

	/**
	* Static map of Days and bool that represents the days of the week that the 
	* department and its rooms are operating.
	*
	* Note: This variable is static because we ASSUME the rooms are opened when the
	* department is opened. We ask the days of operation only once.
	*/
	static map<Days, bool> daysOpened;

	/**
	* Static map of Days and Interval (basically a pair of two times in military time
	* format) that represents the hours of the week that the department and its rooms 
	* are operating.
	*
	* Note: This variable is static because we ASSUME the rooms are opened when the
	* department is opened. We ask the days of operation only once.
	*
	* Note2: Should be changed to map<Days, BOOST_TIME_INTERVAL>.
	*/
	static map<Days, Interval> hoursOpened;

	/**
	* String that represents the prefix of the room.
	* Usually the prefix is used for all the rooms within a building.
	*
	* Example: CC, MATH, LEWIS, CHEM, etc.
	*/
	string prefix;

	/**
	* Integer that represents the room number or name of the room.
	*
	* Example: 101, 102, 203, 305, 404, etc.
	*/
	int roomNumber;
};

#endif