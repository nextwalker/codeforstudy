<?php
/**
 * header()函数的主要功能是将HTTP协议标头(header)输出到浏览器。
 * header函数中Location类型的标头是一种特殊的header调用，常用来实现页面跳转。
 * 1. location和“:”号间不能有空格，否则不会跳转。
 * 2. 在用header前不能有任何的输出。
 * 3. header后的PHP代码还会被执行。exit退出。
 * 
 */
header("Location:http://onetwo.sinaapp.com/index.php?action=header");
exit();
echo "go to baidu!";
sleep(10);
?>