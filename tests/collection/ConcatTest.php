<?php

use function phln\collection\concat;
use const phln\collection\concat;

class ConcatTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_concatenates_two_values()
    {
        $this->assertEquals('ABCD', concat('AB', 'CD'));
        $this->assertEquals([1, 2], concat([1], [2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = concat('A');
        $this->assertEquals('AB', $appendToA('B'));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $appendA = \phln\fn\partial(concat, [\phln\fn\__, 'A']);
        $this->assertEquals('BA', $appendA('B'));
    }

    /** @test */
    public function it_fails_when_arguments_have_different_type()
    {
        $this->expectException(\InvalidArgumentException::class);
        concat('a', ['a']);
    }

    /** @test */
    public function it_fails_when_arguments_have_invalid_type()
    {
        $this->expectException(\InvalidArgumentException::class);
        concat(1, 2);
    }
}
