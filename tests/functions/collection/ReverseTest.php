<?php

use Baethon\Phln as p;

class ReverseTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_reverses_array()
    {
        $list = range(1, 10);
        $this->assertEquals(array_reverse($list), p\reverse($list));
    }

    public function test_it_reverses_string()
    {
        $this->assertEquals('oof', p\reverse('foo'));
    }
}
