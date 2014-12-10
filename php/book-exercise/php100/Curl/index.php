<?php

$user	   = "admin";
$psw  	   = "password";
$url	   = "http://localhost/yangzz/12dev/4/PHP100/Curl/login.php";
$curl_post = "user={$user}&pass={$psw}";

/** 初始化一个cURL对象  */
$curl = curl_init(); 

/** 设置你需要抓取的URL */
curl_setopt($curl, CURLOPT_URL, $url);

/** 设置cURL参数，要求结果保存到字符串中还是输出到屏幕上  */
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);

curl_setopt($curl, CURLOPT_POST, 1);

curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post);

/** 运行cURL，请求网页 */
$data = curl_exec($curl);

/** 关闭URL请求 */
curl_close($curl);

?>