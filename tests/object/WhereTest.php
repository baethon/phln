<?php

use function phln\object\where;

class WhereTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_validates_if_object_passes_predicates()
    {
        $predicates = [
            'a' => \phln\relation\equals('foo'),
            'b' => \phln\collection\contains('foo'),
        ];

        $this->assertTrue(where($predicates, ['a' => 'foo', 'b' => ['foo']]));
        $this->assertTrue(where($predicates, ['a' => 'foo', 'b' => ['foo'], 'c' => 2]));
        $this->assertFalse(where($predicates, ['a' => 'bar', 'b' => ['foo'], 'c' => 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $where = where([
            'a' => \phln\relation\equals('foo'),
            'b' => \phln\collection\contains('foo'),
        ]);

        $this->assertTrue($where(['a' => 'foo', 'b' => ['foo']]));
    }
}
