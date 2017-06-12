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
    public function it_returns_null_on_no_match()
    {
        $this->assertNull($this->callFn('/a/', 'b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $batman = $this->callFn('/na/');
        $this->assertEquals('na', $batman('nanana batman!'));
    }
}
