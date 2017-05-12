<?php

use function phln\collection\concat;
use const phln\collection\concat;

class ConcatTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_concatenates_two_values()
    {
        $this->assertEquals([1, 2], concat([1], [2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = concat(['A']);
        $this->assertEquals(['A', 'B'], $appendToA(['B']));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $appendA = \phln\fn\partial(concat, [\phln\fn\__, ['A']]);
        $this->assertEquals(['B', 'A'], $appendA(['B']));
    }
}
