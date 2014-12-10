<?php

 	class MyClass
 	{
 		const SUNYANG = "三洋科技";
 		
 		function showResult()
 		{
 			echo "SUNYANG2的值为：".self::SUNYANG;
 		}
 	}

 	echo "SUNYANG1的值为：".MyClass::SUNYANG;
 	echo "\n";

 	$object = new MyClass();
 	$object->showResult();
?>
