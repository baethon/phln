<?php

use Baethon\Phln\Phln as P;

class LastTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_last_element_of_array()
    {
        $this->assertEquals(3, P::last([1, 2, 3]));
        $this->assertEquals(1, P::last([1]));
        $this->assertNull(P::last([]));
    }

    public function test_it_returns_last_character_of_string()
    {
        $this->assertEquals('o', P::last('foo'));
        $this->assertEquals('f', P::last('f'));
        $this->assertEquals('', P::last(''));
    }
}
