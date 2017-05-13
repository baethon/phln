<?php

use function phln\string\matchAll;

class MatchAllTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], matchAll('/([a-z]a)/', 'banana'));
        $this->assertEquals(['Lo', 'do', 'lo'], matchAll('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], matchAll('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = matchAll('/na/');
        $this->assertEquals(['na', 'na', 'na'], $batman('nanana batman!'));
    }
}
