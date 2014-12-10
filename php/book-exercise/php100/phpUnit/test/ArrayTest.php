<?php

//require_once 'PHPUnit/Autoload.php';

class ArrayTest extends PHPUnit_Framework_TestCase {
	
	public function testArrayIsEmpty() {
		
		$fixture = array();
		
		$this->assertEquals( 0, sizeof( $fixture ) );
		
	}
	
	public function testArrayContainsAnElement() {
		
		$fixture = array();
		
		$fixture[] = 'Element';
		
		$this->assertEquals( 1, sizeof( $fixture ) );
		
	}
}