<?php 
    session_start();
    $_SESSION['time'] = time();
    $_SESSION['hello'] = 'hello';
    echo session_id();
