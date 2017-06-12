<?php

use const phln\string\matchAll;

class MatchAllTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return matchAll;
    }

    /** @test */
    public function it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], $this->callFn('/([a-z]a)/', 'banana'));
        $this->assertEquals(['Lo', 'do', 'lo'], $this->callFn('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], $this->callFn('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = $this->callFn('/na/');
        $this->assertEquals(['na', 'na', 'na'], $batman('nanana batman!'));
    }
}
