<?php

function curl_post($url, array $post = NULL, array $options = array()) 
{ 
    $defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($post) 
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch); 
    return $result; 
} 

$arr_post = array(
    'iapiver' => 'v3',
    'callback' => 'parent.bd__pcbs__cr7jkd',
    'charset' => 'UTF-8',
    'codestring' => '',
    'isPhone'   => 'false',
    'loginmerge' => 'true',
    'logintype' => 'dialogLogin',
    'mem_pass' => 'on',
    'password' => 'iamyang-zizhe',
    'ppui_logintime' => '25054',
    'quick_user' =>  0,
    'safeflg' => 0,
    'splogin' => 'rate',
    'staticpage' =>  'http://www.baidu.com/cache/user/html/v3Jump.html',
    'token' => '5fa5338b26d5a13fb5882491a6d5a194',
    'tpl' => 'mn',
    'tt' => ,
    'u' =>  'http://www.baidu.com/',
    'username' => 'yangzizhe@qq.com',
    'verifycode' => '',
);

$url = 'https://passport.baidu.com/v2/api/?login';

$options = array();

$result = curl_post($url, $arr_post, $options);
echo "\n\n";
var_dump($result);
