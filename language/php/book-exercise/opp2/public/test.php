<?php
define('APPLICATION_PATH', dirname(__FILE__) . "/..");
// APP要加引号，FILE是两个_

include APPLICATION_PATH . "/lib/ShopProduct.cls.php";

//$product1 = new ShopProduct();
//$product2 = new ShopProduct();

//var_dump($product1);
//var_dump($product2);

//$product1->title = "My Antonia";
//$product1->producerMainName = "Cather";
//$product1->producerFirstName = "Willa";
//$product1->price = 5.99;

$product1 = new ShopProduct( "My Antonia", "Willa", "Cather", 5.99 );
print "author: {$product1->getProducer()}\n";
