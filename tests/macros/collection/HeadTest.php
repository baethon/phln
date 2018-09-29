<?php

use Baethon\Phln\Phln as P;

class HeadTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_head_of_array()
    {
        $this->assertEquals(1, P::head([1, 2, 3]));
        $this->assertEquals(1, P::head([1]));
        $this->assertNull(P::head([]));
    }

    public function test_it_returs_head_of_string()
    {
        $this->assertEquals('f', P::head('foo'));
        $this->assertEquals('f', P::head('f'));
        $this->assertEquals('', P::head(''));
    }
}
