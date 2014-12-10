<?php

	class People
	{
		function __construct($name,$sex,$age)
		{
			$this->name = $name;
			$this->sex = $sex;
			$this->age = $age;
			echo "hello\n";
		}

		function People($name,$sex,$age)
		{
			$this->name = $name;
			$this->sex = $sex;
			$this->age = $age;
			echo "hello2<br>";
		}

		function say()
		{
			echo "name: ".$this->name." ";
			echo "sex:  ".$this->sex." ";
			echo "age   ".$this->age;
			echo "\n";
		}

		function __destruct()
		{
			echo "销毁对象".$this->name."\n";
		}
	}

	$p1 = new People("张三","男",24);
	$p1->say();
	$p2 = new People("李四","女",20);
	$p2->say();
	
	// 对象的自动销毁，先进后出。
?>
