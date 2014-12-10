<?php	

class Number{}

class One extends Number
{
	private $name;
	
	function setName( $name )
	{
		$this->name = $name;
	}
	
	function getName()
	{
		echo $this->name;
	}
	
}

class Two extends Number
{
	private $name;
	
	function setName( $name )
	{
		$this->name = $name;
	}
	
	function getName()
	{
		echo $this->name;
	}
}

class is_class
{
	static function check($obj)
	{
		if($obj instanceof One)
		{
			echo " It is Class One\n";
		}
		elseif($obj instanceof Two)
		{
			echo " It is Class Two\n";
		}
		else 
		{
			echo " It is not Class one and two\n";
		}
		
		if ($obj instanceof Number) {
			echo " It is Class Number\n\n";
		}		
	}
}

$one = new One();
$one->setName("one");
$one->getName();

is_class::check( $one );

$two = new Two();
$two->setName("two");
$two->getName();

is_class::check( $two );

is_class::check($b);

?>