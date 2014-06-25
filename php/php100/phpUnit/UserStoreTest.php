<?php

require_once "UserStore.php";
require_once 'PHPUnit/Autoload.php';

class UserStoreTest extends PHPUnit_Framework_TestCase {
	
	private $store;
	
	public function setUp() {
		$this->store = new UserStore();	
		echo "\nUserStoreTest::setUp";
	}
	
	public function tearDown() {
		echo "\nUserStoreTest::tearDown";
	}
	
	public function testGetUser() {
		$this->store->addUser( "Bob Williams", "a@b.com", '12345' );
		$user = $this->store->getUser( "a@b.com" );
		$this->assertEquals( $user['mail'], 'a@b.com' );
		$this->assertEquals( $user['name'], 'Bob Williams' );
		$this->assertEquals( $user['pass'], '12345');
	}
	
	/*
	public function testAddUser_ShortPass() {
		$this->setExpectedException( 'Exception' );
		$this->store->addUser( "Bob Williams", "Bob@example.com", "ff");
		///*
		try {
			$this->store->addUser( "Bob Williams", "Bob@example.com", "ff");
		} catch ( Exception $e ) { return; }
		$this->fail( "Short Password exception expected" );
	}
	*/
	public function provider() {
		return array(
			array("abc","a@b.com","1234"),
			array("abc","a@b.com","123456"),
			array("abc","a@b.com","12345678"),
		);
	}
	public function testAbc(){
		echo "123";
	}
	
	 /**
     * @dataProvider provider
	 * @expectedException3 Password must have 5 or more letters
     */

	public function testAddUser( $a, $b, $c ) {
		$this->store->addUser( $a, $b, $c );
		//echo $this->getExpectedException();
		$this->setExpectedException('Password must have 5 or more letters');
	}
}

?>