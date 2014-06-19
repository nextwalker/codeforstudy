<?php
/**
 * 创建者模式
 *
 */

//购物车
class ShoppingCart
{
    //选中的商品
    private $_goods = array();
    //使用的优惠券
    private $_tickets = array();
   
    public function addGoods($goods) 
    {
        $this->_goods[] = $goods;
    }

    public function addTicket($ticket)
    {
        $this->_tickets[] = $ticket;
    }

    public function printInfo()
    {
        printf("goods:%s, tickets:%s\n", implode(',', $this->_goods), implode(',', $this->_tickets));
    }
}

//假如我们要还原购物车的东西，比如用户关闭浏览器后再打开时会根据cookie还原
$data = array(
    'goods' => array('衣服', '鞋子'),
    'tickets' => array('减10'),
);

//如果不使用创建者模式，则需要业务类里一步步还原购物车
// $cart = new ShoppingCart();
// foreach ($data['goods'] as $goods) {
//      $cart->addGoods($goods);
// }
// foreach ($data['tickets'] as $ticket) {
//      $cart->addTicket($ticket);
// }
// $cart->printInfo();
// exit;

//我们提供创建者类来封装购物车的数据组装
class CardBuilder 
{
    private $_card;
    
    function __construct($card) {
        $this->_card = $card;
    }

    function build($data) {
        foreach ($data['goods'] as $goods) {
            $this->_card->addGoods($goods);
        }
        foreach ($data['tickets'] as $ticket) {
            $this->_card->addTicket($ticket);
        }
    }

    function getCrad() {
        return $this->_card;
    }
}

$cart = new ShoppingCart();
$builder = new CardBuilder($cart);
$builder->build($data);
echo "after builder:\n"; $cart->printInfo();
?>
