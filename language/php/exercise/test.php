<?php
/*
$cfg = array('a'=>123,'b'=>"456");
static $arr;
echo "123";
$arr = &$cfg['b'];
unset($cfg);
echo $arr;
*/
$var1 = 1234;
$var2 = &$var1;
$var2 =5;
unset( $var1 );
echo $var1,$var2;

$a = array(0,1,2,3);
unset( $a[1] );
print_r($a);