<?php

use const phln\object\path;

class PathTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return path;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_retuns_value_using_dot_notation($object)
    {
        $this->assertEquals('foo', $this->callFn('a.b.c', $object));
        $this->assertEquals(['c' => 'foo'], (array) $this->callFn('a.b', $object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => ['b' => ['c' => 'foo']]]],
            [(object) ['a' => ['b' => ['c' => 'foo']]]],
            [['a' => (object) ['b' => ['c' => 'foo']]]],
            [['a' => ['b' => (object) ['c' => 'foo']]]],
        ];
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
