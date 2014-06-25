<?php

$arg = getopt("d:");

if (empty($arg['d'])) {
    echo "usage: php " . $argv[0] . " -d string\n";
    exit;
}

preg_match_all('/./us', $arg['d'], $match);

print_r($match[0]);
