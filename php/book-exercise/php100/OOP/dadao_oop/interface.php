<?php

 	interface IName
 	{
 		function setName($name);
 		function getName();
 	}

 	interface IAge
 	{
 		function setAge($age);
 		function getAge();
 	}

 	class Yang implements IName,IAge
 	{
 		private $name;
 		private $age;
 		function setName($name)
 		{
 			$this->name = $name;
 		}

 		function setAge($age)
 		{
 			$this->age = $age;
 		}

 		function getName()
 		{
 			echo "name: ".$this->name."  ";
 		}

 		function getAge()
 		{
 			echo "age:  ".$this->age."  ";
 		}
 	}

 	$object = new Yang();
 	$object->setName("yang");
 	$object->getName();
 	$object->setAge(21);
 	$object->getAge();
?>
