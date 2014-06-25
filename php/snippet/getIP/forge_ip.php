<?php

$url = 'http://192.168.46.130/test/get_server_ip.php';
$data_string = 'test=test';
$URL_Info = parse_url($url);
$request = "";
if (!isset($URL_Info["port"])) {
    $URL_Info["port"]=80;
}
$request.="POST ".$URL_Info["path"]." HTTP/1.1\n";
$request.="Host: ".$URL_Info["host"]."\n";
$request.="Referer: ".$URL_Info["host"]."\n";
$request.="Content-type: application/x-www-form-urlencoded\n";
$request.="X-Forwarded-For:192.168.1.4\n";//HTTP_X_FORWARDED_FOR的值
$request.="client_ip:192.168.1.5\n";//HTTP_CLIENT_IP的值
$request.="Content-length: ".strlen($data_string)."\n";
$request.="Connection: close\n";
$request.="\n";
$request.=$data_string."\n";

$fp = fsockopen($URL_Info["host"], $URL_Info["port"]);
fputs($fp, $request);
$result = "";
while(!feof($fp)) {
    $result .= fgets($fp, 1024);
}
fclose($fp);
echo $result;
