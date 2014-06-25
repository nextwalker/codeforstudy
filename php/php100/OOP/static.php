<?php

class StaticExample{
	static public $sNum = 0;
	public $num = 1;
	const  NUM = "100";
	
	static public function sayHello() {
		print "Hello:";
		//print $this->$sNum;
		echo StaticExample::$sNum, '-';
		echo self::$sNum, "\n";
	}
	
	public function sayHi() {
		print "Hello:";
		echo $this->sNum, '-';
		echo StaticExample::$sNum, '-';
		echo self::$sNum, "\n";	
	} 
	
	public function __get( $name ) {
		echo "get";
	}
	
	public function sayByeBye(){
		$this->sayHello();
		StaticExample::sayHello();
		self::sayHello();
		
		self::sayHi();
		StaticExample::sayHi();
	}
	
	public function sayBye() {
		echo StaticExample::$sNum, '-';
		echo StaticExample::NUM, "\n";
		//echo self::num;

	}
}


/**
 * 
 * 1. 静态属性的访问
 * 三种方式   className:: self::  parent::(父类)
 * 
 */


// 类外  className:: 
echo StaticExample::$sNum, '-';
echo StaticExample::$sNum++, '-';
echo ++StaticExample::$sNum, '-';
echo ++StaticExample::$sNum, "\n";

$obj_example = new StaticExample();
echo $obj_example->num, '-';
echo $obj_example->sNum, "\n";

// 静态方法中   className::  self::
StaticExample::sayHello();

// 一般方法中   className::  self::
$obj_example = new StaticExample();
$obj_example->sayHi();


/**
 * 静态属性的访问总结
 * 1. 类外只能使用className：： 来访问，无法使用对象来访问
 * 2. 方法中可使用className::  self::  parent::(限父类)三种方式访问，无法使用伪对象$this->访问
 * Ps:使用对象或者$this->来访问静态属性时，不会报错，但是访问不到
 */

echo "\n\n";

/**
 * 
 * 2. 静态方法的访问
 * 
 */

// 类外  className::  objectName->
StaticExample::sayHello();

$obj_example = new StaticExample();
$obj_example->sayHello();

echo "\n";

// 方法中    className::  self::  parent:: $this-> 均可
$obj_example = new StaticExample();
$obj_example->sayByeBye();

/**
 * 
 * 静态方法的访问总结
 * 类外 className::  objectName->  
 * 方法中    className::  self::  parent:: $this-> 均可
 * 
 * 静态方法总结：
 * 静态方法中使用了$this->,编译的时候并不会报错，但在调用的时候会报错
 * 静态方法中只能使用  className::  self::  parent:: 来访问属性和方法
 * 
 */


echo "\n\n";

// 	className::methodName() 静态调用; 
//	1. 能调用静态方法，
//	2. 如果方法不是静态的，但方法同时也满足静态方法的要求，也可以静态调用;

/**
 * 3. 静态调用
 * 
 */

// 一般属性 无法调用    静态属性长,常量属性均可调用
// 一般方法满足静态方法的要求，也可以静态调用

echo StaticExample::$sNum, '-';
echo StaticExample::NUM, "\n";
//echo StaticExample::num, '_';
StaticExample::sayHello();
StaticExample::sayBye();

?>