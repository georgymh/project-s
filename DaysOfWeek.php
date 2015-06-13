<?php

/*
	Georgy Marrero.
	June 12, 2015.
*/

/**
* Enum type (abstact class in PHP) "DaysOfWeek" that contains the 7 days 
* of the week.
*
* Note: I'm not using the new SplEnum (http://php.net/manual/en/class.splenum.php)
* because it requires you to initialize the class in order to use it. I find
* this one to emulate the C++ Enum types better.
*
* Usage:
*
* $today = DaysOfWeek::Sunday;				
*
*/
abstract class DaysOfWeek extends BasicEnum {
    const Sunday = 0;
    const Monday = 1;
    const Tuesday = 2;
    const Wednesday = 3;
    const Thursday = 4;
    const Friday = 5;
    const Saturday = 6;
}

/*
*
* Helper abstract class for extra functionalities when using an enum.
*
* Credits: http://stackoverflow.com/questions/254514/php-and-enumerations
*
* Usage:
* 
* DaysOfWeek::isValidName('Humpday');                  // false
* DaysOfWeek::isValidName('Monday');                   // true
* DaysOfWeek::isValidName('monday');                   // true
* DaysOfWeek::isValidName('monday', $strict = true);   // false
* DaysOfWeek::isValidName(0);                          // false
* 
* DaysOfWeek::isValidValue(0);                         // true
* DaysOfWeek::isValidValue(5);                         // true
* DaysOfWeek::isValidValue(7);                         // false
* DaysOfWeek::isValidValue('Friday');                  // false
*/
abstract class BasicEnum {
    private static $constCacheArray = NULL;

    private static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict = true);
    }
}

/*
*
* Convenience array with every day of the week.
* 
*/
$arrayOfDays = [	
	DaysOfWeek::Monday,
	DaysOfWeek::Tuesday,
	DaysOfWeek::Wednesday,
	DaysOfWeek::Thursday,
	DaysOfWeek::Friday,
	DaysOfWeek::Saturday,
	DaysOfWeek::Sunday
	];

// TESTING CASES
/*
DaysOfWeek::isValidName('Humpday');                  // false
DaysOfWeek::isValidName('Monday');                   // true
DaysOfWeek::isValidName('monday');                   // true
DaysOfWeek::isValidName('monday', $strict = true);   // false
DaysOfWeek::isValidName(0);                          // false

DaysOfWeek::isValidValue(0);                         // true
DaysOfWeek::isValidValue(5);                         // true
DaysOfWeek::isValidValue(7);                         // false
DaysOfWeek::isValidValue('Friday');                  // false
*/

?>