<?php
define("NUM",123);
echo NUM,"\n";
//NUM = NUM + 1; 会报错 echo NUM+1;

//变量的变量 
$i=1;
$i++;
$foo = "bar".$i++;
$$foo = "abc";
echo $bar,'-',$abc,"-",$foo,"-",$$foo,"\n\n";


//变量的引用
echo $var1 = "123";  echo "\n";
//echo &$var1; 会报错
echo $var2 = &$var1;  echo "\n"; //表达式的值为123
$var2 = 5;
echo $var1,"--",$var2,"\n\n"; // var1,var2 同时变化

//特殊运算符
$str = "0d52";
echo $str + 5,"\n";
$num = 5;
echo $str + $num,"--",$str.$num,"\n\n";

echo (0==$str)?"Yes":"No","\n";
echo ("0"==$str)?"Yes":"No","\n";
echo (0===$str)?"Yes":"No","\n\n";

$arr = array( );

for ( $i = 0; $i < 6000; $i++ ) {
	$n = rand(1,6);
	$arr[$n]++;
}
print_r($arr);

?>