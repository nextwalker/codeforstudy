<?php

$a = array(
    'status' => '200',
    'data' => array('0','1','2')
);
echo json_encode($a);
echo "\n\n";

$b = '{
    "_id":{"$id":"52b955d06950f6180b00004f"},
    "bytes_sent":"28270",
    "date":"2013-12-24",
    "host":"www.91waijiao.com",
    "http_referer":"-",
    "http_user_agent":"DNSPod-Monitor\/1.0",
    "http_x_forwarded_for":"61.152.100.115",
    "remote_addr":"42.121.114.19",
    "request_time":"0.050",
    "request_uri":"\/",
    "status":"200",
    "time":{"sec":1387877839,"usec":0},
    "uid":"-",
    "upstream_response_time":"0.048"
}';
print_r(json_decode($b));
