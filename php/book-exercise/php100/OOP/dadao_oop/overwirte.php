<?php

 class People
 {
 	function __construct($name,$age)
 	{
 		$this->name = $name;
 		$this->age = $age;
 	}

 	function say()
 	{
 		echo "name: ".$this->name." ";
 		echo "Age:  ".$this->age." ";
 		echo "<br />";
 	}

 	function __destruct(){}
 }

 class Student extends People
 {
 	function say($language)
 	{
 		echo $this->name." study ".$language."...";
 	}

 	/*function say()
 	{
 		echo "hello";
 	}*/ //不能重名函数
 }

 	$student = new Student("yang",20);
 	$student->say("php"); echo "\n";
 	//$student->say();
?>


