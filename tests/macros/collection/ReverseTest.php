<?php

use Baethon\Phln\Phln as P;

class ReverseTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_reverses_array()
    {
        $list = range(1, 10);
        $this->assertEquals(array_reverse($list), P::reverse($list));
    }

    public function test_it_reverses_string()
    {
        $this->assertEquals('oof', P::reverse('foo'));
    }
}
