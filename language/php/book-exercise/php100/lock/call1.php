<?php

$fp = fopen("lock.txt","a+");
fwrite($fp,"  open1: ".time()." " . date("Y-m-d H:i:s") . "\n" );
sleep(1);
flock($fp,LOCK_EX);
fwrite($fp,"  lock1: ".time()." " . date("Y-m-d H:i:s") . "\n" );
sleep(10);
flock($fp,LOCK_UN);
fwrite($fp,"unlock1: ".time()." " . date("Y-m-d H:i:s") . "\n" );
sleep(1);
fwrite($fp," close1: ".time()." " . date("Y-m-d H:i:s") . "\n\n" );

?>