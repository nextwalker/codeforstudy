<?php
/**
 * 
 * 模拟登录
 * @var unknown_type
 */
$cktime		= "2592000";
$pwuser		= "yangzizhe";
$pwpwd		= "iamyangzizhe";
$hideid		= 1;
$cookie_file = tempnam('./temp', 'cookie');	
$url		= "http://bbs.php100.com/login.php";
$curl_post	= "cktime={$cktime}&step=2&pwuser={$pwuser}&lgt=0&pwpwd={$pwpwd}&hideid={$hideid}";

$curl = curl_init(); 

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post);
curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file);

$data = curl_exec($curl);
curl_close($curl);

/**
 * 
 * 操作登陆后的页面
 * @var unknown_type
 */
$url = "http://bbs.php100.com/userpay.php";

$curl = curl_init(); 
//curl_setopt($curl, CURLOPT_HEADER, "Content-Type:text/html;charset='GBK'");
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);

$contents = curl_exec($curl);

/**
 * 编码问题
 * 1. 采集页面使用同样的字符集
 * 2. 采集的内容进行转码
 * 3. 采集的正则表达式进行转码
 * 
 */ 
//preg_match("/<li>��Ǯ:(.*)<\/li>/", $contents, $match);

//$contents = mb_convert_encoding($contents, 'UTF-8','GBK');
//header("Content-Type:text/html;charset='UTF-8'");
//preg_match("/<li>金钱:(.*)<\/li>/", $contents, $match);

$preg = "/<li>金钱:(.*)<\/li>/";
$preg = mb_convert_encoding($preg, 'GBK','UTF-8');
preg_match($preg, $contents, $match);
print_r($match);
curl_close($curl);


?>