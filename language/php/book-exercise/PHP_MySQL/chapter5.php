<?php
echo  disk_free_space("C:") . "B = " 
	. disk_free_space("C:")/1024 . "KB = " 
	. disk_free_space("C:")/(1024*1024) . "MB= " 
	. disk_free_space("C:")/(1024*1024*1024) . "GB \n";
echo  disk_total_space("C:") . "B = " 
	. disk_total_space("C:")/1024 . "KB = " 
	. disk_total_space("C:")/(1024*1024) . "MB= " 
	. disk_total_space("C:")/(1024*1024*1024) . "GB \n";

echo getcwd() . "\n"; 
chdir(getcwd()."/..");
echo getcwd() . "\n"; 

function get_file_exists( $filename ) {
	if ( file_exists($filename) ) {
		echo "file ".$filename." is exists\n";
	} else {
		echo "file ".$filename." is not exists\n";
	}
}
$filename = "Hello";
get_file_exists( $filename );
//创建文件，创建前应先判断,不允许同名文件存在，若存在返回警告；
mkdir($filename,"0777"); 
get_file_exists( $filename );
//删除文件，删除前应先判断
rmdir($filename);
get_file_exists( $filename );

print_r(dir("."));//dir函数返回的是一个对象，echo不能打印，print_r可以打印对象的属性值
echo $path = getcwd();
$dirObj = dir($path);
print_r( $dirObj );
while($entry = $dirObj->read()) {
	echo mb_convert_encoding($entry, 'UTF-8', 'GBK') . "\n";
}
$dirObj->Rewind();
while($entry = $dirObj->read()) {
	echo mb_convert_encoding($entry, 'UTF-8', 'GBK') . "\n";
}
$dirObj->close(); //关闭之后，原对象属性仍然存在，但是原对象不能再read了
print_r($dirObj);
function get_file_attribute( $filename ) {
	echo filesize("$filename") . "\n";
	echo fileatime("$filename") . "\n";
	echo date("Y-m-d H:i:s", fileatime("$filename")) . "\n";
	echo date("Y-m-d H:i:s", filemtime("$filename")) . "\n";
	echo date("Y-m-d H:i:s", filectime("$filename")) . "\n";
}
get_file_attribute("config.yaml");
?>