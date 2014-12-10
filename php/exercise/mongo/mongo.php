<?php

$config['server'] = "mongodb://192.168.11.55:27017";
#$config['server'] = "mongodb://192.168.46.130:27017";
$config['db_name'] = "roi";
$conn = new MongoClient($config['server']);
// array("replicaSet" => "myReplSet")
$mongo = $conn->$config['db_name'];
$result = $mongo->waijiao_access_log->findOne();
echo json_encode($result);

