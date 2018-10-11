<?php

use Baethon\Phln\Phln as P;

class PathTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_retuns_value_using_dot_notation($object)
    {
        $this->assertEquals('foo', P::path('a.b.c', $object));
        $this->assertEquals(['c' => 'foo'], (array) P::path('a.b', $object));
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

    public function test_it_returns_null_for_invalid_path()
    {
        $object = ['a' => ['b' => ['c' => 1]]];
        $this->assertNull(P::path('a.b.c.d', $object));
        $this->assertNull(P::path('a.b.e', $object));
    }
}
