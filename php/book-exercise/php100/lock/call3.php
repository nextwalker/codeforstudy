<?php

$fp = fopen("lock.txt","a+");
fwrite($fp,"  open3: ".time()." " . date("Y-m-d H:i:s") . " " );
sleep(4);
fwrite($fp," close3: ".time()." " . date("Y-m-d H:i:s") . "\n" );

?>