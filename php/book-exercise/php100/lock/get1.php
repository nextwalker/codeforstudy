<?php

$fpid = fopen("idmax.txt","w");
$fp = fopen("id.txt","a+");
for ( $i=0; $i< 50000; $i++ ) {
	$id = (int)fgets($fpid);
	fwrite($fp,"id1: ".++$id." createtime:".time()." " . date("Y-m-d H:i:s") . "\n" );
	fwrite($fpid,$id);
}
fwrite($fp,"close: ".time()." " . date("Y-m-d H:i:s") . "\n" );

?>