<?php

/**
 * 工厂模式
 *
 */

//抽象产品
interface Person {
    public function getName();
}

//具体产品实现
class Teacher implements Person {
    function getName() {
        return "老师\n";
    }
}

class Student implements Person {
    function getName() {
        return "学生\n";
    }
}

//简单工厂
class SimpleFactory {
    public static function getPerson($type) {
        $person = null;
        if ($type == 'teacher') {
            $person = new Teacher();
        } elseif ($type == 'student') {
            $person = new Student();
        }
        return $person;
    }
}

//简单工厂调用
class SimpleClient {
    function main() {
        // 如果不用工厂模式，则需要提前指定具体类
        // $person = new Teacher();
        // echo $person->getName();
        // $person = new Student();
        // echo $person->getName();
        // 用工厂模式，则不需要知道对象由什么类产生，交给工厂去决定
        $person = SimpleFactory::getPerson('teacher');
        echo $person->getName();
        $person = SimpleFactory::getPerson('student');
        echo $person->getName();
    }
}

//工厂方法
interface   CommFactory {
    public function getPerson();
}

//具体工厂实现
class StudentFactory implements CommFactory {
    function getPerson(){
        return new Student();
    }
}

class TeacherFactory implements CommFactory {
    function getPerson() {
        return new Teacher();
    }
}

//工厂方法调用
class CommClient {
    static function main() {
        $factory = new TeacherFactory();
        echo $factory->getPerson()->getName();
        $factory = new StudentFactory();
        echo $factory->getPerson()->getName();
    }
}

//抽象工厂模式另一条产品线
interface Grade {
    function getYear();
}

//另一条产品线的具体产品
class Grade1 implements Grade {
    public function getYear() {
        return '2003级';
    }
}

class Grade2 implements Grade {
    public function getYear() {
        return '2004级';
    }
}

//抽象工厂
interface AbstractFactory {
    function getPerson();
    function getGrade();
}

//具体工厂可以产生每个产品线的产品
class Grade1TeacherFactory implements AbstractFactory {
    public function getPerson() {
        return new Teacher();
    }

    public function getGrade() {
        return new Grade1();
    }
}

class Grade1StudentFactory implements AbstractFactory {
    public function getPerson() {
        return new Student();
    }

    public function getGrade() {
        return new Grade1();
    }
}

class Grade2TeacherFactory implements AbstractFactory {
    public function getPerson() {
        return new Teacher();
    }

    public function getGrade() {
        return new Grade2();
    }
}

//抽象工厂调用
class FactoryClient {
    function printInfo($factory) {
        echo $factory->getGrade()->getYear() . $factory->getPerson()->getName();
    }

    function main() {
        $client = new FactoryClient();
        $factory = new Grade1TeacherFactory();
        $client->printInfo($factory);
        $factory = new Grade1StudentFactory();
        $client->printInfo($factory);
        $factory = new Grade2TeacherFactory();
        $client->printInfo($factory);
    }
}

//简单工厂
SimpleClient::main();
//工厂方法
CommClient::main();
//抽象工厂
FactoryClient::main();

?>
