#include <iostream>

#include "Room.h"

// Static variables (Explicit declarations)
string Room::buildingName; // Initialized as an empty string.
map<Days, bool> Room::daysOpened; // Initialized as an empty map.
map<Days, Interval> Room::hoursOpened; // Initialized as an empty map.

// Constructors
Room::Room()
	: roomNumber(0)
{
	// prefix is automatically initialized to ""
}

Room::Room(string prefix, int roomNumber)
	: prefix(prefix), roomNumber(roomNumber) {}


// Getters
string Room::getPrefix() const
{
	return prefix;
}

int Room::getRoomNumber() const
{
	return roomNumber;
}

string Room::getBuildingName()
{
	return buildingName;
}

map<Days, bool> Room::getDaysOpened()
{
	return daysOpened;
}

map<Days, Interval> Room::getHoursOpened()
{
	return hoursOpened;
}


// Setters
void Room::setPrefix(string newPrefix)
{
	prefix = newPrefix;
}

void Room::setRoomNumber(int newRoomNumber)
{
	roomNumber = newRoomNumber;
}

void Room::setBuildingName(string newBuildingName)
{
	buildingName = newBuildingName;
}

void Room::setDaysOpened(map<Days, bool> newDaysOpened)
{
	daysOpened = newDaysOpened;
}

void Room::setHoursOpened(map<Days, Interval> newHoursOpened)
{
	// SHOULD MAKE THIS INITIATE DEPENDING ON THE TRUE VALUES FROM daysOpened.

	hoursOpened = newHoursOpened;
}


// Print
void Room::print()
{
	cout << "Room name: " << prefix << " " << roomNumber << endl
		 << "Building name: " << buildingName << endl
		 << "Days opened: " << endl;

	// Printing map
	for (map<Days, bool>::const_iterator it = daysOpened.begin(); it != daysOpened.end(); ++it)
		cout << "    " << it->first << " " << it->second << endl;

	cout << "Hours opened: " << endl;

	// Printing map
	for (map<Days, Interval>::const_iterator it = hoursOpened.begin(); it != hoursOpened.end(); ++it)
		cout << "    " << it->first << ". " << it->second << endl;

	cout << endl;
}