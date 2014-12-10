<?php

 	class People{
 		//public $name;
 		private $name;
 		
 		function setName($name)
 		{
 			$this->name=$name;
 		}
 		
 		function getName()
 		{
 			echo $this->name."\n";
 		}
 		
 		function study()
 		{
 			echo "正在学习PHP...----\n";
 		}
 		
 	}
 	
 	/*$Tom = new People();
 	$Tom->name = "Tom";
 	$Tom->study();
 	
 	$Lily = new People();
 	$Lily->name = "Lily";
 	$Lily->study();*/
 	
 	$user1 = new People();
 	$user1->setName("小明");
 	$user1->getName();
 	$user1->study();

?>
