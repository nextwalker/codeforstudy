<?php
// just create from the proto file a pb_prot[NAME].php file
require_once('parser/pb_parser.php');

if (!isset($argv[1])) {
    echo "Usage php proto.php file.proto\n";
    exit(0);
}
if (!file_exists($argv[1])) {
    echo "$argv[1] not exists\n";
    exit(0);
}
$test = new PBParser();
$test->parse($argv[1]);
?>
