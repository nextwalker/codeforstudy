<?php

$num = 100;

$filename = "tmp.txt";

$fp = fopen($filename, "a");

for ($i = 0; $i < $num; $i++) {
    fwrite($fp, "process 2:" . $i . "\r\n");
    usleep(100000);
}
fclose($fp);
