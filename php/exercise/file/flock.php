<?php
    
function T_put($filename,$string){  
    $fp = fopen($filename,'a'); //追加方式打开  
    if (flock($fp, LOCK_EX)){ //加写锁  
    fputs($fp,$string); //写文件  
    flock($fp, LOCK_UN); //解锁  
    }  
    fclose($fp);  
}

function T_get($filename,$length){  
    $fp = fopen($filename,'r'); //追加方式打开  
    if (flock($fp, LOCK_SH)){ //加读锁  
    $result = fgets($fp,$length); //读取文件  
    flock($fp, LOCK_UN); //解锁  
    }  
    fclose($fp);  
    return $result;  
} 
