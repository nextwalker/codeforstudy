<?php


	class People
	{
		function __construct($name,$age)
		{
			$this->name = $name;
			$this->age = $age;
			echo "";
		}

		function say()
		{
			echo "name: ".$this->name."  ";
			echo "age:  ".$this->age."  <br />";
		}
		function __destruct(){
			echo "";
		}
	}

	class Student extends People
	{
		function __construct($name,$age)
		{
			$this->name = $name;
			$this->age = $age;
			echo "";
		}

		function study($language)
		{
			echo "Now, study".$language."...<br />";
		}

		function __destruct()
		{
			echo "";
		}
	}

	$student = new Student("yang",21);
	$student->say();
	$student->study("PHP");
?>
