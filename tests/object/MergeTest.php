<?php

use const phln\object\merge;

class MergeTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return merge;
    }

    /** @test */
    public function it_merges_two_objects()
    {
        $left = ['a' => 1];
        $right = ['b' => 2];

        $this->assertEquals(array_merge($left, $right), $this->callFn($left, $right));
    }

    /** @test */
    public function it_is_curried()
    {
        $left = ['a' => 1];
        $right = ['b' => 2];
        $merge = $this->callFn($left);

        $this->assertEquals(array_merge($left, $right), $merge($right));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $reset = \phln\fn\partial($this->getResolvedFn(), [\phln\fn\__, ['x' => 0]]);
        $this->assertEquals(['x' => 0, 'y' => 1], $reset(['x' => 2, 'y' => 1]));
    }
}
