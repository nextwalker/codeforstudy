<?php
    
$ch = curl_init('http://www.baidu.com/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);

echo "\n\n\n\n";

if(!curl_errno($ch)) {
    $info = curl_getinfo($ch);
    echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
}

curl_close($ch);

echo "\n\n";
    // curl_setopt($ch, CURLOPT_PORT, 80);
