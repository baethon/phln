<?php

use Baethon\Phln as p;

class LastTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_last_element_of_array()
    {
        $this->assertEquals(3, p\last([1, 2, 3]));
        $this->assertEquals(1, p\last([1]));
        $this->assertNull(p\last([]));
    }

    public function test_it_returns_last_character_of_string()
    {
        $this->assertEquals('o', p\last('foo'));
        $this->assertEquals('f', p\last('f'));
        $this->assertEquals('', p\last(''));
    }
}
