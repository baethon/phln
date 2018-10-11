<?php

use Baethon\Phln\Phln as P;

class PluckTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_plucks_value_by_key()
    {
        $this->assertEquals([1, 2], P::pluck('a', [['a' => 1], ['a' => 2]]));
        $this->assertEquals([1, 2], P::pluck(1, [[0, 1], [1, 2]]));
    }
}
