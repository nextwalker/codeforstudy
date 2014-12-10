<?php
require_once('FirePHPCore/fb.php');

ob_start();
FB::group('Test Group A');
FB::info('Info message');
FB::info('hello');
FB::groupEnd();
FB::group('Test Group B');
FB::info('Info message');
FB::info('hello');
FB::warn('Warn message');
FB::error('Error message');
FB::log('hello');
FB::groupEnd();
$table[] = array('Col 1 Heading','Col 2 Heading','Col 2 Heading');
$table[] = array('Row 1 Col 1','Row 1 Col 2','Row 1 Col 2');
$table[] = array('Row 2 Col 1','Row 2 Col 2');
$table[] = array('Row 3 Col 1','Row 3 Col 2');
FB::table('Table Label', $table);
FB::log(array("hello","world","nothings","error","happend"));

class mytest {
	function myfn() {
		static $a = 100;
		fb($a,'a1');
		$a++;
		static $a = 200;
		fb($a,'a2');
		return $a;
	}
}
$t = new mytest();
$arr = $t->myfn();
FB::trace($arr);
$var = array('a'=>'pizza', 'b'=>'cookies', 'c'=>'celery'); 
fb($var); 
fb($var, "An array"); 
fb($var, FirePHP::WARN); 
fb($var, FirePHP::INFO); 
fb($var, 'An array with an Error type', FirePHP::ERROR); 

function hello() { 
  fb('Hello World!', FirePHP::TRACE); 
} 
function greet() { 
  hello(); 
} 
greet(); 
		
//require_once('FirePHPCore/FirePHP.class.php');
?>