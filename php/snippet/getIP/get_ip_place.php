<?php

header('Content-type: text/html;charset=UTF-8');

echo $hello = "Yangzizhe";
echo $world = "杨子哲";
echo urlencode( $hello.$world );
echo "<br />";

$data = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=218.192.3.42 ");
echo utf8_decode( $data );
echo utf8_encode( $data );
echo $data;
echo "<br />";

$result = json_decode( $data, true );
print_r( $result );
// echo unescape( $data );

function get_ip_place(){

$ip=file_get_contents("http://fw.qq.com/ipaddress");


$ip=str_replace('"',' ',$ip);


$ip2=explode("(",$ip);


$a=substr($ip2[1],0,-2);


$b=explode(",",$a);


return $b;

}




$ip=get_ip_place();




print_r($ip);