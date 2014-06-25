<?php

class ShopProduct {
	public $title;
	public $producerMainName;
	public $producerFirstNamel;
	public $price;
	
	/*
	function  ShopProduct2(){
		echo "excute ShopProduct\n";
	}
	*/
	
	/*
	function ShopProduct( int $title, $firstName, $mainName, $price ){
		$this->tile = $title;
		$this->producerFirstNamel = $firstName;
		$this->producerMainName = $mainName;
		$this->price = $price;
		echo "excute ShopProduct\n";
	}
	*/
	
	function __construct( $title, $firstName, $mainName=NULL, $price ) {
		$this->tile = $title;
		$this->producerFirstNamel = $firstName;
		$this->producerMainName = $mainName;
		$this->price = $price;
		echo "excute ShopProduct __consturct\n";		
	}
	
	function getProducer() {
		return "{$this->producerFirstNamel}".
				" {$this->producerMainName}";
	}
}

$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
//$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
print "author:{$product1->getProducer()}\n";

// PHP5 没有声明构造函数的时候，会自动生成空的构造函数（有待进一步验证）
// PHP5 构造函数支持两种格式：__construct()，CLASSNAME()
// 默认执行的是__construct(), 当没有__constuct()的时候 执行的是ShopProduc()构造函数，当没有

// PHP5 不支持在当前类中进行重载，会报错，
// 不能重复声明同名方法，Cannot redeclare ShopProduct::__construct()
// __construct ShopProcuct 也不支持重载。

// 类型提示  --> 强制检查参数类型     书上有错误， 基本类型也可以
// Argument 1 passed to ShopProduct::__construct() must be an instance of int, string given
// 但是类型提示是在运行时才生效，(隐藏在条件语句中将无法发现)
// 也可以通过is_int() die() 强制进行类型检查

?>
