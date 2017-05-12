<?php

use function phln\string\concatString;
use const phln\string\concatString;

class StringConcatTestConcatTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_concatenates_two_values()
    {
        $this->assertEquals('ABCD', concatString('AB', 'CD'));
    }

    /** @test */
    public function it_is_curried()
    {
        $appendToA = concatString('A');
        $this->assertEquals('AB', $appendToA('B'));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $appendA = \phln\fn\partial(concatString, [\phln\fn\__, 'A']);
        $this->assertEquals('BA', $appendA('B'));
    }
}
