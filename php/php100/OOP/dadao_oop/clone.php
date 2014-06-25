<?php
	class MyClass
	{
		public $title;
		
		function __construct()
		{
			echo "construct\n";
		}
		
		public function _clone()
		{
			//echo "对象已被克隆\n";
			//return new MyClass();
		}
	}
	
$objectA = new MyClass();

$objectA->title = "object ";
$objectB = $objectA;
echo "用等号赋值--A:{$objectA->title} B:{$objectB->title} \n";
$objectA->title = "objectA";
echo "改变A的值---A:{$objectA->title} B:{$objectB->title} \n";
$objectB->title = "objectB";
echo "改变B的值---A:{$objectA->title} B:{$objectB->title} \n";

echo "\n\n";

$objectA->title = "object ";
$objectC= clone $objectA;
echo "用clone赋值-A:{$objectA->title} B:{$objectB->title} \n";
$objectA->title = "objectA";
echo "改变A的值---A:{$objectA->title} C:{$objectC->title} \n";
$objectC->title = "objectC";
echo "改变C的值---A:{$objectA->title} C:{$objectC->title} \n";


// 对象默认是按引用传递的;( $obj1 = $obj2 )

// 可以通过clone关键字，自动调用__clone方法，来实现复制。
// 使用关键字clone，但类中没有__clone方法，php是不报错的,依然可以复制

// 浅复制 单纯意义上数据的赋值
// 深复制 连引用的内容也重新生成一份

// 


?>