<?php

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$msg = 'hello';
$len = strlen($msg);
socket_sendto($sock, $msg, $len, 0, '127.0.0.1', 11109);
socket_close($sock);

?>
