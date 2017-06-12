<?php

use const phln\object\path;

class PathTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return path;
    }

    /** @test */
    public function it_retuns_value_using_dot_notation()
    {
        $object = ['a' => ['b' => ['c' => 'foo']]];

        $this->assertEquals('foo', $this->callFn('a.b.c', $object));
        $this->assertEquals(['c' => 'foo'], $this->callFn('a.b', $object));
    }

    /** @test */
    public function it_returns_null_for_invalid_path()
    {
        $object = ['a' => ['b' => ['c' => 1]]];
        $this->assertNull($this->callFn('a.b.c.d', $object));
        $this->assertNull($this->callFn('a.b.e', $object));
    }

    /** @test */
    public function it_is_curried()
    {
        $getC = $this->callFn('a.b.c');
        $this->assertEquals('foo', $getC(['a' => ['b' => ['c' => 'foo']]]));
    }
}
