<?php

use function phln\string\match;

class MatchTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_first_match()
    {
        $this->assertEquals('ba', match('/([a-z]a)/', 'banana'));
        $this->assertEquals('Lo', match('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_null_on_no_match()
    {
        $this->assertNull(match('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = match('/na/');
        $this->assertEquals('na', $batman('nanana batman!'));
    }
}
