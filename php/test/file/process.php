<?php

$num = 4;

$pid = isset($argv[1]) ? intval($argv[1]) : 0;

$filename = "tmp.txt";

for ($i = 0; $i < $num; $i++) {
    $fp = fopen($filename, "a");
    //file_write($fp, $pid . $i);
    concurrency_file_write($fp, $pid . $i);
    fclose($fp);
}

function get_number_string()
{
    $number = "0";
    for($i = 1; $i < $num; $i++) {
        $number .= ":" . $i;
    }
    return $number;
}

function file_write($fp, $process=0) {
    fwrite($fp, "process-" . $process . ":");
    for($i = 1; $i < 30; $i++) {
        fwrite($fp, $i . " ");
        usleep(100000);
    }
    fwrite($fp, "\r\n");
}

function concurrency_file_write($fp, $process) {
    if (flock($fp, LOCK_EX)) {
        file_write($fp, $process);
        flock($fp, LOCK_UN);
    }
}
