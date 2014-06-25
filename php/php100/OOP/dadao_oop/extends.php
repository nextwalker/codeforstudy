<?php

class People
{
	function __construct($name,$age)
	{
		$this->name = $name;
		$this->age 	= $age;
	}
	
	function say()
	{
		echo "name:".$this->name." ";
		echo "age:".$this->age." ";
	}
	function __destruct(){}
}

class Student extends People
{	
	function study($language){
		echo "Now,study".$language."...";
	}
}

$student = new Student("yang", 20);
$student->say(); 
echo "\n";
$student->study("php");

?>