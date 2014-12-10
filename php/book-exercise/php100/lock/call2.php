<?php

$fp = fopen("lock.txt","a+");
fwrite($fp,"  open2: ".time()." " . date("Y-m-d H:i:s") . " " );
sleep(4);
fwrite($fp," close2: ".time()." " . date("Y-m-d H:i:s") . "\n" );

?>