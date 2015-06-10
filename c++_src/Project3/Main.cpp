#include <string>
#include <iostream>

#include "Interval.h"
#include "Room.h"

using namespace std;

void testInterval();
void testRoom();

int main()
{
	//testInterval();
	//testRoom();
	
	cout << endl;
	system("Pause");
	return 0;
}

void testInterval()
{
	// TESTING CASES FOR INTERVAL CLASS
	cout << "TESTING INTERVAL CLASS" << endl << endl;

	Interval operationHours;

	cout << "Default constructor ========" << endl;
	cout << "Opening time: " << operationHours.start << endl;
	cout << "Closing time: " << operationHours.end << endl;
	cout << "Diference: " << operationHours.getDiference() << endl; // should output error
	cout << endl;

	operationHours.start = 1400; // 2 o clock
	operationHours.end = 1800; // 6 o clock

	cout << "After change ------" << endl;
	cout << "Opening time: " << operationHours.start << endl;
	cout << "Closing time: " << operationHours.end << endl;
	cout << "Diference: " << operationHours.getDiference() << endl; // 4 hours
	cout << endl;

	Interval operationHours2(800);

	cout << "Overloaded constructor (int) ========" << endl;
	cout << "Opening time: " << operationHours2.start << endl;
	cout << "Closing time: " << operationHours2.end << endl;
	cout << "Diference: " << operationHours2.getDiference() << endl; // should output error
	cout << endl;

	operationHours2.end = 1830; // 4 o clock

	cout << "After change ------" << endl;
	cout << "Opening time: " << operationHours2.start << endl;
	cout << "Closing time: " << operationHours2.end << endl;
	cout << "Diference: " << operationHours2.getDiference() << endl; // 10 hours and a half
	cout << endl;

	Interval operationHours3(730, 1030);

	cout << "Overloaded constructor (int, int) ========" << endl;
	cout << "Opening time: " << operationHours3.start << endl;
	cout << "Closing time: " << operationHours3.end << endl;
	cout << "Diference: " << operationHours3.getDiference() << endl; // 3 hours
	cout << endl;

	operationHours3.start = 1130; // 4 o clock

	cout << "After change ------" << endl;
	cout << "Opening time: " << operationHours3.start << endl;
	cout << "Closing time: " << operationHours3.end << endl;
	cout << "Diference: " << operationHours3.getDiference() << endl; // should output error
	cout << endl << endl << endl;
}

void testRoom()
{
	// TESTING CASES FOR ROOM
	cout << "TESTING ROOM CLASS" << endl << endl;

	Room cc100;
	cout << "Default Constructor (empty) [before static variables] =====" << endl;
	cc100.print();

	// Setting Static Variables
	cout << "**Setting Static Variables**" << endl;
	Room::setBuildingName("Computing Center");
	Room::setDaysOpened(
	{
		{ Monday, true },
		{ Tuesday, true },
		{ Wednesday, true },
		{ Thursday, true },
		{ Friday, true },
		{ Saturday, true },
		{ Sunday, false }
	});

	//Interval weekdaysOperationHours(730, 2230);
	//Interval fridayOperationHours(900, 1800);
	//Interval weekendOperationHours(900, 1500);

	Room::setHoursOpened(
	{
		{ Monday, Interval(730, 2230) },
		{ Tuesday, Interval(730, 2230) },
		{ Wednesday, Interval(730, 2230) },
		{ Thursday, Interval(730, 2230) },
		{ Friday, Interval(900, 1800) },
		{ Saturday, Interval(900, 1500) },
		{ Saturday, Interval() }
	});

	Room cc101;
	cout << "Default Constructor (empty) =====" << endl;
	cc101.print();

	Room cc102("CC", 102);
	cout << "Overloaded Constructor (\"CC\", 102) =====" << endl;
	cc102.print();

	Room cc103;
	cout << "Default Constructor then set values =====" << endl;
	cc103.setPrefix("CC");
	cc103.setRoomNumber(103);
	cc103.print();

	Room cc104("CC", 888);
	cout << "Overloaded Constructor (\"CC\", 888) then set values to CC 104 =====" << endl;
	cc103.setPrefix("CC");
	cc103.setRoomNumber(104);
	cc103.print();

	Room lastRoom("BE", 106);
	cout << "Overloaded Constructor (\"BE\", 106) then change static variables =====" << endl;

	// Changing Static Variables
	cout << "**Changing Static Variables**" << endl;
	Room::setBuildingName("Business Education");
	Room::setDaysOpened(
	{
		{ Monday, true },
		{ Tuesday, true },
		{ Wednesday, true },
		{ Thursday, true },
		{ Friday, true },
		{ Saturday, false },
		{ Sunday, false }
	});

	//Interval weekdaysOperationHours(730, 2230);
	//Interval fridayOperationHours(900, 1800);
	//Interval weekendOperationHours(900, 1500);

	Room::setHoursOpened(
	{
		{ Monday, Interval(900, 2200) },
		{ Tuesday, Interval(900, 2200) },
		{ Wednesday, Interval(900, 2200) },
		{ Thursday, Interval(900, 2200) },
		{ Friday, Interval(900, 1500) },
		{ Saturday, Interval() },
		{ Saturday, Interval() }
	});

	lastRoom.print();

	cout << endl << endl << endl;
}