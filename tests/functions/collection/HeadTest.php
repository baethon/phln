<?php

use Baethon\Phln as p;

class HeadTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_head_of_array()
    {
        $this->assertEquals(1, p\head([1, 2, 3]));
        $this->assertEquals(1, p\head([1]));
        $this->assertNull(p\head([]));
    }

    public function test_it_returs_head_of_string()
    {
        $this->assertEquals('f', p\head('foo'));
        $this->assertEquals('f', p\head('f'));
        $this->assertEquals('', p\head(''));
    }
}
