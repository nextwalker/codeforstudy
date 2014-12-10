<?php

function test() {
    global $next;
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS['foo'] . "\n";
    echo '$foo in current scope: ' . $foo . "\n";
    echo '$next is ' . $next . "\n";
}

$foo = "Example content";
$next = "Hello Next";
test();
