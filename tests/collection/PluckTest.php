<?php

use function phln\collection\pluck;

class PluckTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_plucks_value_by_key()
    {
        $this->assertEquals([1, 2], pluck('a', [['a' => 1], ['a' => 2]]));
        $this->assertEquals([1, 2], pluck(1, [[0, 1], [1, 2]]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = pluck('a');
        $this->assertEquals([1], $f([['a' => 1]]));
    }
}
