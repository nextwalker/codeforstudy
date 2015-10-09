<?php
/**
 * 单例模式
 *
 */
class DbConn
{
    private static $_instance = null;
    protected static $_counter = 0;
    protected $_db;
    
    //私有化构造函数，不允许外部创建实例
    private function __construct()
    {
        self::$_counter += 1;
    }

    public function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new DbConn();
        }
        return self::$_instance;
    }

    public function connect()
    {
        echo "connected:" . (self::$_counter) . "\n";
        return $this->_db;
    }
}
/*
* 不使用单例模式时，删除构造函数的private后再测试，第二次调用构造函数后，_counter变成2
*/
// $conn = new DbConn();
// $conn->connect();
// $conn = new DbConn();
// $conn->connect();
// 使用单例模式后不能直接new对象，必须调用getInstance获取
$conn = DbConn::getInstance();
$db = $conn->connect();
//第二次调用是同一个实例，_counter还是1
$conn = DbConn::getInstance();
$db = $conn->connect();

?>
