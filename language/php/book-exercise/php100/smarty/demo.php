<?php
include_once("./smarty.inc.php");

$name = "hello��Mr yang";
$news = array(
	0 => array("name" => "�����","date" => "2011.10.1"),
	1 => array("name" => "ʥ����","date" => "2011.12.25"),
	2 => array("name" => "Ԫ����","date" => "2012.1.1"),
	3 => array("name" => "�����")
	);
$todaynews = array(
	'10' => array("name" => "�����","date" => "2011.10.1"),
	'11' => array("name" => "ʥ����","date" => "2011.12.25"),
	'12' => array("name" => "Ԫ����","date" => "2012.1.1"),
	'13' => array("name" => "�����")
	);
$user = array(
	0 => array("name" => "�����","date" => "2011.10.1",'address' => '����'),
	1 => array("name" => "ʥ����","date" => "2011.12.25")
);
$menu=array(  
	'hello' =>array(  
		'menuName'=> '��˾���',  
		'menuCss' => 'current_tab',  
		'menuUrl' => ''),  
	'hi' => array(  
		'menuName'=> '�쵼�´�',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Lead'),  
	array(  
		'menuName'=> '��ҵ�Ļ�',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Culture'),  
	array(  
		'menuName'=> '��ϵ����',  
		'menuCss' => '',  
		'menuUrl' => 'index.php?controller=TyAbout&action=Contact'),  
); 
$row = array("����","����","����");
$smarty->assign("title",$name);
$smarty->assign("row",$row);
$smarty->assign("news",$news);
$smarty->assign("user",$user);
$smarty->assign("todaynews",$todaynews);
$smarty->assign("menu",$menu);
$smarty->display("demo.html");
?>