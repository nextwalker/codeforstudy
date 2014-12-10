<?php

 	interface Tools
 	{
 		function goHome();
 	}
 	
 	class Walk implements Tools
 	{
 		function goHome()
 		{
 			echo "walk \n";
 		}
 	}

 	class Bicycle implements Tools
 	{
 		function goHome()
 		{
 			echo "Bicycle \n";
 		}
 	}

 	function printRightSelect($object)
 	{
 		if($object instanceof Tools)
 		{
 			$object->goHome();
 		}
 		else
 		{
 			echo "error\n";
 		}
 	}

 	echo "goHome:";
 	$object1 = new Walk();
 	printRightSelect($object1);

  	echo "goHome:";
 	$object2 = new Bicycle();
 	printRightSelect($object2);
?>
