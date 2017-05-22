<?php

use function phln\object\path;
use const phln\object\path;

class PathTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_retuns_value_using_dot_notation()
    {
        $object = ['a' => ['b' => ['c' => 'foo']]];

        $this->assertEquals('foo', path('a.b.c', $object));
        $this->assertEquals(['c' => 'foo'], path('a.b', $object));
    }

    /** @test */
    public function it_returns_null_for_invalid_path()
    {
        $object = ['a' => ['b' => ['c' => 1]]];
        $this->assertNull(path('a.b.c.d', $object));
        $this->assertNull(path('a.b.e', $object));
    }

    /** @test */
    public function it_is_curried()
    {
        $getC = path('a.b.c');
        $this->assertEquals('foo', $getC(['a' => ['b' => ['c' => 'foo']]]));
    }
}
