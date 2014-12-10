<?php

class People
{
	public function __construct($name)
	{
		$this->name = $name;
		echo "parent_consruct\n";
	}
	
	function __destruct()
	{
		echo "parent_desruct\n";
	}
	
}

class Student extends People
{
	
	function __construct($name,$age)
	{
		parent::__construct($name);
		$this->age = $age;
		echo "Student_consruct\n";
	}
	
	function say()
	{
		echo "name:".$this->name." ";
		echo "age:".$this->age." ";
	}
	
	function study($language)
	{
		echo "Now,study".$language."...";
	}
	
	function __destruct()
	{
		parent::__destruct();
		echo "Student_desruct\n";
	}
	
}

	$student = new Student("yang", 20);
	$student->say();
	echo"\n";
	$student->study("php");
	echo "\n";
?>