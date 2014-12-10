<?php
include_once("./smarty.inc.php");

$name = "hello，Mr yang";
$news = array(
	0 => array("name" => "国庆节","date" => "2011.10.1"),
	1 => array("name" => "圣诞节","date" => "2011.12.25"),
	2 => array("name" => "元旦节","date" => "2012.1.1"),
	3 => array("name" => "中秋节")
	);
$todaynews = array(
	'10' => array("name" => "国庆节","date" => "2011.10.1"),
	'11' => array("name" => "圣诞节","date" => "2011.12.25"),
	'12' => array("name" => "元旦节","date" => "2012.1.1"),
	'13' => array("name" => "中秋节")
	);
$user = array(
	0 => array("name" => "国庆节","date" => "2011.10.1",'address' => '北京'),
	1 => array("name" => "圣诞节","date" => "2011.12.25")
);
$menu=array(  
	'hello' =>array(  
		'menuName'=> '公司简介',  
		'menuCss' => 'current_tab',  
		'menuUrl' => ''),  
	'hi' => array(  
		'menuName'=> '领导致辞',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Lead'),  
	array(  
		'menuName'=> '企业文化',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Culture'),  
	array(  
		'menuName'=> '联系我们',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Contact'),  
); 
$row = array("标题","作者","内容");
$smarty->assign("title",$name);
$smarty->assign("row",$row);
$smarty->assign("news",$news);
$smarty->assign("user",$user);
$smarty->assign("todaynews",$todaynews);
$smarty->assign("menu",$menu);
$smarty->display("demo.html");
?>