<?php

	require_once ('Examples/jpgraph/jpgraph.php'); // 载入基本类
	require_once ('Examples/jpgraph/jpgraph_pie.php');  // 载入饼图类

	$data = array(40,60,21,33,12,33); // 初始数据
	$graph = new PieGraph(300,300); // 创建一个新图和尺寸
	$graph->SetShadow(); // 创建初始化

	$graph->title->Set("www.php100.com"); // 设置图片头部文字
	$graph->title->SetFont(FF_FONT1,FS_BOLD); //设置字体类型
	$graph->title->SetFont(FF_SIMSUN,FS_BOLD); //设置字体类型

	$p1 = new PiePlot($data); // 实例化饼图并载入初始数据
	$p1->SetTheme("sand"); //设置样式
	$p1->SetCenter(0.1); //设置饼图位置
	$p1->value->Show(false);  // 是否输出值
	$graph->Add($p1); // 增加合并样式
	$graph->Stroke(); //输出