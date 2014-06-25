<?php
/**
 * 
 * Meta标签是HTML中负责提供文档元信息的标签，在PHP程序中使用该标签，也可以实现页面跳转。 
 * 若定义http-equiv为refresh,则打开该页面时将根据content规定的值在一定时间内跳转到相应页面。
 * 若设置content="秒数;url=网址"，则定义了经过多长时间后页面跳转到指定的网址。
 * 
 */
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh" content="3;url=http://onetwo.sinaapp.com/index.php?action=meta">
	</head>
	<body>
	页面停留3秒...跳转到MR Onetwo的博客
	</body>
</html>