<?php

use Baethon\Phln\Phln as P;

class DivideTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_divides_values()
    {
        $this->assertEquals(1 / 2, P::divide(1, 2));
    }

    public function test_it_can_be_curried()
    {
        $g = P::divide(1);
        $this->assertEquals(1 / 2, $g(2));
    }
}
