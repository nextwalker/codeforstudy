<?php 

require_once 'PHPUnit/Autoload.php';

class DataTest extends PHPUnit_Framework_TestCase 
{ 
	public static function provider() 
	{ 
		return array( 
			array(0, 0, 0), 
			array(0, 1, 1), 
			array(1, 0, 1), 
			array(1, 1, 3) 
		); 
	} 
	
	/** 
	 * @dataProvider provider 
	 */ 
	 
	// 注意：上面的注释是用来指明数据提供者的方法的

	public function testAdd($a, $b, $c) 
	{ 
		$this->assertEquals($c, $a + $b); 
	} 

} ?>