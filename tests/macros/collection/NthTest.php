<?php

use Baethon\Phln\Phln as P;

class NthTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_element_on_given_index()
    {
        $this->assertEquals(2, P::nth(1, [1, 2, 3]));
    }

    public function test_it_returns_element_on_given_negative_index()
    {
        $this->assertEquals(3, P::nth(-1, [1, 2, 3]));
    }

    public function test_it_returns_null_when_element_is_not_defined()
    {
        $this->assertNull(P::nth(1000, [1, 2, 3]));
    }
}
