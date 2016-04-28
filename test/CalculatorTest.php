<?php

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    public function testAdd()
    {
        $n1 = 1;
        $n2 = 2;
        $handler = new \handler\tutorial\Calculator();
        $sum = $handler->add($n1, $n2);
        $this->assertEquals($sum, 3);
    }

}
