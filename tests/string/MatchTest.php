<?php

use const phln\string\match;

class MatchTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return match;
    }

    /** @test */
    public function it_returns_first_match()
    {
        $this->assertEquals('ba', $this->callFn('/([a-z]a)/', 'banana'));
        $this->assertEquals('Lo', $this->callFn('/([a-z](o))/i', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_return_all_matches()
    {
        $this->assertEquals(['ba', 'na', 'na'], $this->callFn('/([a-z]a)/g', 'banana'));
        $this->assertEquals(['Lo', 'do', 'lo'], $this->callFn('/([a-z](o))/gi', 'Lorem ipsum dolor'));
    }

    /** @test */
    public function it_returns_null_on_no_match()
    {
        $this->assertNull($this->callFn('/a/', 'b'));
    }

    /** @test */
    public function it_returns_empty_result_on_none_match()
    {
        $this->assertEquals([], $this->callFn('/a/g', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = $this->callFn('/na/');
        $this->assertEquals('na', $batman('nanana batman!'));
    }
}
