/*
Georgy Marrero.
June 2, 2015.
*/

#ifndef INTERVAL_H_
#define INTERVAL_H_

#include <string>
#include <utility>

using namespace std;

/** 
* Temporary Time Interval class.
*
* This class represents a time interval with a starting time and an ending time.
* Basically a pair of two times in military time format.
*
* Usage: 
*	interval.start = 0800; // 8:00 AM
*	interval.end = 1230; // 12:30 PM
*	cout << interval.getDiference(); // prints 0430 (1230-0800)
*/
class Interval
{

// Overloaded Operator
friend ostream& operator<<(ostream& out, Interval interval);

public:
	/**
	* Public Data Members
	*
	* start: Represents the left bound or starting time of a time interval.
	* end: Represents the right bound or ending time of a time interval.
	*
	* Note: The data members of this class are public so that it can be easily
	* accessed by any other class (like a pair's first and second).
	*/
	int start;
	int end;

	// Constructors
	Interval();
	Interval(int start);
	Interval(int start, int end);

	/**
	* Function that returns the difference between the beginning and the ending
	* of the interval.
	*
	* @return int Returns a duration in military hours.
	*/
	int getDiference() const;

private:
	/**
	* Sets start and end to 0.
	*/
	void initializeToDefaultState();
};

#endif