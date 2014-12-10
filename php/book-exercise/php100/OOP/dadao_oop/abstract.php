<?php

abstract class Study
{
	abstract function PrintStudy($name,$language);
}

class OneStudy extends Study
{
	
 	function PrintStudy($name,$language)
	{
		echo $name."  study  ".$language;
 	}

}

//$a = new Study();
$first = new OneStudy();
$first->PrintStudy("yang","PHP");
?>
