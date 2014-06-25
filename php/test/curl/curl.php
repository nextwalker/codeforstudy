<?php
    
function  getCurl($url) 
{
    $ch = curl_init();
    $timeout = 5; 
    curl_setopt ($ch, CURLOPT_URL, $url); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $contents = curl_exec($ch); 
    curl_close($ch); 
    return $contents; 
}

$content = getCurl("www.baidu.com");

echo "\n\n\n";
echo $content;
echo "\n\n\n";
