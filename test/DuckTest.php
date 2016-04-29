<?php

class DuckTest extends PHPUnit_Framework_TestCase
{

    public function testSay()
    {
        $handler = new \handler\tutorial\Duck();
        $str = '嘎嘎';
        $ret = $handler->say($str);
        $this->assertEquals($ret, $str);
    }

    public function testSleep()
    {
        $handler = new \handler\tutorial\Duck();
        $t1 = time();
        $ret = $handler->sleep(1);
        $t2 = time();
        $this->assertTrue(($t2 - $t1) > 0.5);
    }

}
