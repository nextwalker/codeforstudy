<?php

echo $hello = "Yangzizhe";
echo $world = "杨子哲";
echo urlencode( $hello.$world );
echo "\n";

echo $data = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=218.192.3.42 ");
echo unicode_encode($data);
$result = json_decode( $data );
echo unescape( $data );

print_r($result);

echo preg_replace('/(\w{2})/e',"chr(hexdec('\\1'))",$data);
