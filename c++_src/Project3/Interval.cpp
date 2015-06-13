#include <iostream>

#include "Interval.h"

Interval::Interval()
	: start(0), end(0) {}

Interval::Interval(int start)
{
	if (start > 2400)
	{
		// Initialize start and end with 0.
		initializeToDefaultState();

		cerr << "Starting time cannot be greater than 2400 (24:00)." << endl;
	}
	else
	{
		this->start = start;
		end = 0;
	}
}

Interval::Interval(int start, int end)
{
	if (start < 0)
	{
		// Initialize start and end with 0.
		initializeToDefaultState();

		cerr << "Starting time is less than 0000." << endl
			 << "*Initializing start and end with 0...*" << endl;
	}
	else if (end > 2400)
	{
		// Initialize start and end with 0.
		initializeToDefaultState();

		cerr << "Ending time is greater than 2400." << endl
			<< "*Initializing start and end with 0...*" << endl;
	}
	else if (start > end)
	{		
		// Invert both to prevent error and UX bugs.
		this->start = end;
		this->end = start;

		cerr << "Starting time cannot be greater than the ending time." << endl
			 << "*Reverting order...*" << endl;
	}
	else if (start == end)
	{
		// Initialize start and end with 0.
		initializeToDefaultState();

		cerr << "Starting time cannot be greater than the ending time." << endl
			 << "*Initializing start and end with 0...*" << endl;
	}
	else
	{
		// No problems!
		this->start = start;
		this->end = end;
	}
}

int Interval::getDiference() const
{
	if (end == 0 || start == 0)
	{
		cerr << "Start or end are not properly set." << endl;

		// This number represents a number only gotten by an error exception.
		return 999; 
	}
	
	return (abs(end - start)); // Returns the absolute value of the times.
}

void Interval::initializeToDefaultState()
{
	start = 0;
	end = 0;
}


// Overloaded Operator
ostream& operator<<(ostream& out, Interval interval)
{
	out << "Starting time: " << interval.start << ". Ending time: " << interval.end << ".\n";
	return out;
}
