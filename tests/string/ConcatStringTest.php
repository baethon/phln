<?php

use const phln\string\concatString;

class ConcatStringTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return concatString;
    }

    /** @test */
    public function it_concatenates_two_values()
    {
        $this->assertEquals('ABCD', $this->callFn('AB', 'CD'));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = $this->callFn('A');
        $this->assertEquals('AB', $appendToA('B'));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $appendA = \phln\fn\partial($this->getResolvedFn(), [\phln\fn\__, 'A']);
        $this->assertEquals('BA', $appendA('B'));
    }
}
