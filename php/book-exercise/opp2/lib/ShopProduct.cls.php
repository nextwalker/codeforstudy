<?php
class ShopProduct {
	public $title;
	public $producerMainNamname;
	public $producerFirstName;
	public $pricei = 0;

	public function __construct( $title, $firstName, $mainName, $price ) {
		$this->title			 = $title;
		$this->producerMainName  = $mainName;
		$this->producerFirstName = $firstName;
		$this->price			 = $price;
	}
	public function getProducer() {
		return	"{$this->producerFirstName}" .
				" {$this->producerMainName}";
	}	
}
