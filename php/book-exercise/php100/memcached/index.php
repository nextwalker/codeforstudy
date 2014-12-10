<?php
header("Content-Type:text/html;charset='UTF-8'");
$mem = new Memcache;
$mem->connect('127.0.0.1', 11211) or die ("连接失败");
echo $mem->getVersion();
echo "<br />";
//$mem->set( 'name', 'keyrun', 'zip', '3600');
if( $mem->add('zi','keyrun') ) {
	echo $val = $mem->get('name');	
}else{
	echo "error";
}
echo "<br />";
if( $mem->set('name','yang') ) {
	echo $val = $mem->get('name');	
}else{
	echo "error";
}
echo "<br />";
$mem->set('arr', array( "一个", "两个" ));
print_r($mem->get('arr'));
?>