<?php

require_once 'PHPUnit/Autoload.php';

class ExceptionTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * 
	 * 两种方法设定期望的异常  1. @expectedException 2. setExpectedException
	 * $this->setExpectedException( 'InvalidArgumentException' );
	 * 设定多个会被覆盖，只留最后一个
	 * 
	 */
	
	
	/**
	 * 版本1
	 * @expectedException InvalidArgumentException
	 */
	
	
	public function testException() {
		// $this->setExpectedException( 'InvalidArgumentException2' );
		throw new Exception('InvalidArgumentException');
	}
	
	
    /**
     * @expectedException     InvalidArgumentException
     * @expectedExceptionCode 20
     */
    public function testExceptionHasErrorcode20()
    {
        throw new InvalidArgumentException('Some Message', 20);
    }

	 /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Some Message
     */
    public function testExceptionHasRightMessage()
    {
        throw new InvalidArgumentException('Some Message', 10);
    }
 
    /**
     * @expectedException     InvalidArgumentException
     * @expectedExceptionCode 20
     */
    public function testExceptionHasRightCode()
    {
        throw new InvalidArgumentException('Some Message', 20);
    }

	
	/**
	 * 版本2
	 */
	/*
	public function testException2() {
		$this->setExpectedException( 'InvalidArgumentException' );
		
	}
	*/
	/**
	 * 版本3
	 */
	/*
	public function testException3() {
		try {
			
		} catch ( InvalidArgumentException $expected ) {
			return;
		}
		$this->fail( 'No get expected Exception' );	
	}
	*/
}
?>
