<?php

class Root {
	
	public static $rootName;
	private $rootdate; // 不区分大小写？？
	private $root;
	
	/*
	function Root() {
		echo "construct Root\n";
	}
	*/
	
	function __construct() {
		$this->rootName = "hello\n";
		$this->rootdate = "2011\n";
		$this->root 	= "root\n";
		echo "__construct Root\n";
	}
	
	function echoToday() {
		echo date("Y-m-d H:i:s");
		echo "\n";
	}
	
	function __destruct() {
		echo "__destruct Root\n";
	}
	
	function __get($name) {
		return $this->$name; // $name动态的属性名
	}
	
	function __set($name, $value) {
		$this->$name = $value; // $name注意区别
	}
	
}

class Sun extends Root {
	
	function __construct1() {
		//Root::__construct();
		echo "__construct Sun\n";
	}
	
	function echoYesterday() {
		echo date( "Y-m-d H:i:s", strtotime("yesterday") );
		echo "\n";
		//Root::echoToday();
	}
	
	function __destruct1() {
		//Root::__destruct();
		echo "__destruct Sun\n";
	}
	
}


/*
	$rootObj = new Root();
	// echo $rootObj->$rootdate; // 不报错，但是无法访问
	echo $rootObj->rootdate;
	echo $rootObj->root;
	$rootObj->root = "root,hello\n";
	$rootObj->rootdate = "2012\n";
	echo $rootObj->rootdate;
	echo $rootObj->root;
	$rootObj = null;
	//unset( $rootObj );
	echo "\n\n\n";
*/

// 注意__get() __set()的真正作用
// $rootObj = null; unset的时候都会调用析构函数

/*
Sun::echoToday();   // 为何？不构造对象吗？ 非静态方法？
die;
*/

$obj = new Sun();  
echo get_class( $obj ); 
//echo $obj->rootName;
$obj->echoToday(); 
$obj->echoYesterday();

//  PHP的构造函数、析构函数的调用(除了是自动调用以外)和正常的函数调用是一样的。
//	先在当前类中搜索，再在子类中搜索，若没搜到，自动生成一个空的。__consturct -> className
//  重载也和普通方法是一样的。

?>