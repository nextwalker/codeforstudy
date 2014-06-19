<?php
/**
 * 原型模式
 *
 */

//声明一个克隆自身的接口
interface Prototype {
    function copy();
}

//产品要实现克隆自身的操作
class Student implements Prototype {
    //简单起见，这里没有使用get set
    public $school;
    public $major;
    public $name;

    public function __construct($school, $major, $name) {
        $this->school = $school;
        $this->major = $major;
        $this->name = $name;
    }

    public function printInfo() {
        printf("%s,%s,%s\n", $this->school, $this->major, $this->name);
    }

    public function copy() {
        return clone $this;
    }
}

$stu1 = new Student('清华大学', '计算机', '张三');
$stu1->printInfo();
$stu2 = $stu1->copy();
$stu2->name = '李四';
$stu2->printInfo();

?>
