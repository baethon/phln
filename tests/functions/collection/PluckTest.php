<?php

use Baethon\Phln as p;

class PluckTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_plucks_value_by_key()
    {
        $this->assertEquals([1, 2], p\pluck([['a' => 1], ['a' => 2]], 'a'));
        $this->assertEquals([1, 2], p\pluck([[0, 1], [1, 2]], 1));
    }
}
