<?php
class Exception4Test extends PHPUnit_Framework_TestCase {
    public function testException() {
        try {
            // ... 预期会引发异常的代码 ...
        }

        catch (InvalidArgumentException $expected) {
            return;
        }

        $this->fail('预期的异常未出现。');
    }
}
?>
