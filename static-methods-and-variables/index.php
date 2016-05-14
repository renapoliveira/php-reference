<?php
//Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.
//A property declared as static cannot be accessed with an instantiated class object (though a static method can).
class Test
{
    public static $staticVar = "Static Variable";

    function __construct()
    {
        //The code below is creating a new property and not adding a value to the static variable
        $this->staticVar = "Instance property";
    }

    public function normalMethod()
    {
        return $this->staticVar;
    }

    //Static methods are not related to the "$this" instance and cannot access it.
    public static function staticMethod()
    {
        return self::$staticVar;
    }
}

$mytest = new Test();
print $mytest->normalMethod() . "\n";
print $mytest->staticVar . "\n";

//To access static methods and variables
print Test::staticMethod() . "\n";
print Test::$staticVar . "\n";

$classname = "Test";
print $classname::$staticVar . "\n"; // As of PHP 5.3.0
print $classname::staticMethod() . "\n"; // As of PHP 5.3.0

//The code below does not work.
//$mytest::normalMethod();
