<?php

use Baethon\Phln as p;

class PathTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_retuns_value_using_dot_notation($object)
    {
        $this->assertEquals('foo', p\path($object, 'a.b.c'));
        $this->assertEquals(['c' => 'foo'], (array) p\path($object, 'a.b'));
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
        $this->assertNull(p\path($object, 'a.b.c.d'));
        $this->assertEquals('default', p\path($object, 'a.b.c.d', 'default'));
        $this->assertNull(p\path($object, 'a.b.e'));
    }
}
