<?php

require_once 'UserStore.php';
require_once 'Validator.php';
require_once 'PHPUnit/Autoload.php';

class ValidatorTest extends PHPUnit_Framework_TestCase {
	
	private $validator;
	
	public function setUp() {
		$store = new UserStore();
		$store->addUser( "Bob Williams", "Bob@example.com", "12345" );
		$this->validator = new Validator( $store );
		echo "\nValidatorTest::setUp";
	}
	
	public function tearDown() {
		echo "\nValidatorTest::tearDown";
	}
	
	public function testValidate_CorrectPass() {
		$this->assertTrue(
			$this->validator->validateUser( "Bob@example.com", "12345" ),
			"Exception successful validation"
		);
	} 
}
?>