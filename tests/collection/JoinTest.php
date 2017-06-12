<?php

use const phln\collection\join;

class JoinTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return join;
    }

    /** @test */
    public function it_joins_array_elements()
    {
        $this->assertEquals('1,2,3', $this->callFn(',', [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $spacer = $this->callFn(' ');
        $this->assertEquals('1 2 3', $spacer([1, 2, 3]));
    }
}
