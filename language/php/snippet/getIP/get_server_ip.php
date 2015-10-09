<?php

$s_onlineip = getenv('HTTP_CLIENT_IP');
echo "HTTP_CLIENT_IP:".$s_onlineip."<br/>\n";
$s_onlineip = getenv('HTTP_X_FORWARDED_FOR');
echo "HTTP_X_FORWARDED_FOR:".$s_onlineip."<br/>\n";
$s_onlineip = getenv('REMOTE_ADDR');
echo "REMOTE_ADDR:".$s_onlineip."<br/>\n";
$s_onlineip = $_SERVER['REMOTE_ADDR'];
echo "\$_SERVER['REMOTE_ADDR']:".$s_onlineip."<br/>\n";
