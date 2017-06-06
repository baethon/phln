<?php

use function phln\collection\concat;
use const phln\collection\concat;

class ConcatTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return concat;
    }

    /** @test */
    public function it_concatenates_two_values()
    {
        $this->assertEquals([1, 2], $this->callFn([1], [2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = $this->callFn(['A']);
        $this->assertEquals(['A', 'B'], $appendToA(['B']));
    }
}
