<?php 
$fp = stream_socket_client("tcp://127.0.0.1:9501", $code, $msg, 3);
if (!$fp) {
    exit("$errstr ($errno)\n");
}
$http_request = "GET /index.html HTTP/1.1\r\n";
$http_request .= "Host: localhost\r\n\r\n";
fwrite($fp, $http_request);
swoole_event_add($fp, function($fp){
    echo fread($fp, 8192);
    swoole_event_del($fp);
    fclose($fp);
});
echo "http response:\n";
//swoole_event_wait(); //低于PHP5.4需要加swoole_event_wait
