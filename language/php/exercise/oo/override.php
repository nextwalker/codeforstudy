<?php
//狗有两只眼睛，会汪汪叫，会跑
class  Dog
{
    protected  $eyeNumber = 2; //
    //返回封装的属性方法
    public function getEyeNumber() {
        return $this->eyeNumber;
    }
    //狗会叫
    public function  yaff($num) {
        return  "Dog yaff, wang ..wang ..". $num . ".";
    }
    //狗会跑
    public function  run() {
        return  "Dog run..running ...";
    }
}
$dog = new Dog();
echo "dog have " . $dog->getEyeNumber() . " eyes.\n";
echo $dog->yaff(3) . "\n" . $dog->run();
echo  "\n\n";
//这是我的小狗，叫"狗狗",他还小不会汪汪叫，智慧哼哼。。

class MyDog extends Dog
{
    private $name = "My dog";
    
    public function getName() {
        return $this->name;
    }
    
    public function  yaff() {
        return  $this->name . " yaff, heng...heng ..";
    } 
}
$myDog = new MyDog();
echo $myDog->getName() . " have " . $myDog->getEyeNumber() . " eyes. \n";
echo $myDog->yaff() . "\n" . $myDog->yaff(3) . "\n" . $myDog->run();
echo "\n\n"

// strict error
?>
