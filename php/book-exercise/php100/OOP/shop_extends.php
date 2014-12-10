<?php

class ShopProduct {
	private   $title;
	private   $producerMainName;
	private   $producerFirstName;
	protected $price;
	private   $discount;
	
	function __construct( $title, $firstName, $mainName, $price ) {
		$this->title			 	= $title;
		$this->producerFirstName 	= $firstName;
		$this->producerMainName		= $mainName;
		$this->price				= $price;
	}
	
	public function getProducerFirstName() {
		return $this->producerFirstName;
	}
	
	function getProducer() {
		return "{$this->producerFirstName}".
				"{$this->producerMainName}";
	}
	
	function getSummaryLine() {
		$base = "$this->title( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		return $base;
	}
	
	function setDiscount( $num ) {
		$this->discount = $num;
	}
	
	function getPrice() {
		return ( $this->price - $this->discount );
	}
	
}

class CdPrduct extends ShopProduct {
	public $playLength;
	
	function __construct($title, $firstName, $mainName, $price, $playLength) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->playLength = $playLength;
	}
	function getPlayLength() {
		return $this->playLength;
	}
	
	function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= ":playing time - {$this->playLenth}";
		return $base;
	}
}

class BookProcuct extends ShopProduct {
	public $numPages;
	
	function __construct($title, $firstName, $mainName, $price, $numPages) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->numPages = $numPages;
	}
	
	function getNumberOfPages() {
		return $this->numPages;
	}
	
	function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= ":page count - {$this->numPages}";
		return $base;
	}
}

class ShopProductWrite {
	private $products = array();
	
	public function addProduct( ShopProduct $shopProduct ) {
		$this->products[] = $shopProduct;
	}
	
	public function write() {
		$str = "";
		foreach ( $this->products as $shopProduct ) {
			$str .= "{$shopProduct->title}:";
			$str .= $shopProduct->getProducer();
			$str .= "({$shopProduct->getPrice()})\n";
		}
		print $str;
	}
}

$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
$cdProcut2 = new CdPrduct("My Antonia", "Willa", "Cather", 5.99,'500');
$shopProductWrite = new ShopProductWrite();
$shopProductWrite->addProduct( $product1 );
$shopProductWrite->addProduct( $cdProcut2 );
$shopProductWrite->write();