<?php

use Baethon\Phln\Phln as P;

class MultiplyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_multiplies_two_numbers()
    {
        $this->assertEquals(4, P::multiply(2, 2));
    }

    public function test_it_is_curried()
    {
        $triple = P::multiply(3);
        $this->assertEquals(6, $triple(2));
    }
}
