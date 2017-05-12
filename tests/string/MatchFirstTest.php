<?php

use function phln\string\matchFirst;

class MatchFirstTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_first_match()
    {
        $this->assertEquals('ba', matchFirst('/([a-z]a)/', 'banana'));
        $this->assertEquals('Lo', matchFirst('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_null_on_no_match()
    {
        $this->assertNull(matchFirst('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = matchFirst('/na/');
        $this->assertEquals('na', $batman('nanana batman!'));
    }
}
