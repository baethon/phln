<?php

use const phln\object\pathOr;

class PathOrTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return pathOr;
    }

    /** @test */
    public function it_returns_default_value()
    {
        $this->assertEquals('foo', $this->callFn('a.b.c', 'foo', ['a' => ['b' => 1]]));
    }

    /** @test */
    public function it_returns_existing_value()
    {
        $this->assertEquals(1, $this->callFn('a.b', 'foo', ['a' => ['b' => 1]]));
    }

    /** @test */
    public function it_does_not_return_default_for_falsey_values()
    {
        $this->assertEquals(0, $this->callFn('a.b', 'foo', ['a' => ['b' => 0]]));
    }

    /** @test */
    public function it_is_curried()
    {
        $path = $this->callFn('a.b.c', 'foo');
        $this->assertEquals('foo', $path(['a' => ['b' => 1]]));
    }
}
