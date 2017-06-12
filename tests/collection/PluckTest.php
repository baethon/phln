<?php

use const phln\collection\pluck;

class PluckTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return pluck;
    }

    /** @test */
    public function it_plucks_value_by_key()
    {
        $this->assertEquals([1, 2], $this->callFn('a', [['a' => 1], ['a' => 2]]));
        $this->assertEquals([1, 2], $this->callFn(1, [[0, 1], [1, 2]]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn('a');
        $this->assertEquals([1], $f([['a' => 1]]));
    }
}
