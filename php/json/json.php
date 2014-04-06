<?php

$arr = array(
    'name' => "中国北京",
);

echo $a = json_encode($arr);

print_r(json_decode($a));
