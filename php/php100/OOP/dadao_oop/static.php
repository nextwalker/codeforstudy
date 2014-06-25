<?php

 	class MyClass
 	{
 		static $staticvariable = 0;
		/* 		function addOne()
		 		{
		 			self::$staticvariable++;
		 			echo "<br />\$staticvariable 2��ֵΪ�� ".self::$staticvariable;

		 		}
		 		*/

 		static function showResult($number)
 		{
 			echo "\$number = ".$number;
 			echo "\n";
 			self::addOne($number);
 		}
 		
 		static function addOne($number)
 		{
 			echo "\$number+1 = ";
 			echo $number+1;
 		}
 	}

 	MyClass::$staticvariable++;
 	echo "\$staticvariable  ".MyClass::$staticvariable;

 	//$object = new MyClass();
 	//$object->addOne();

 	$number = 100;
 	MyClass::showResult($number);
?>
