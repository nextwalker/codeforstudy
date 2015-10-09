<?php

	// first
	
	$fixture = array();
	print sizeof( $fixture ) . "\n";
	
	$fixture[] = 'element';
	print sizeof( $fixture ) . "\n";
	
	echo "\n";
	
	// second 
	
	$fixture = array();
	print ( sizeof( $fixture ) == 0 ? "ok" : "not ok" ). "\n";
	
	$fixture[] = 'element';
	print ( sizeof( $fixture ) == 0 ? "ok" : "not ok" ) . "\n";
	
	// third 自动化测试
	
	$fixture = array();
	assertTrue( sizeof( $fixture ) == 0 );
	
	$fixture[] = 'element';
	assertTrue( sizeof( $fixture ) == 1 );
	
	function assertTrue( $condition )
	{
		if ( !$condition ) {
			throw new Exception( 'Assertion failed.' );
		}
	}