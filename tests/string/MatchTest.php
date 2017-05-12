<?php

use function phln\string\match;

class MatchTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], match('/([a-z]a)/', 'banana'));
        $this->assertEquals(['Lo', 'do', 'lo'], match('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], match('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = match('/na/');
        $this->assertEquals(['na', 'na', 'na'], $batman('nanana batman!'));
    }
}
