<?php

use const phln\object\where;

class WhereTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return where;
    }

    /** @test */
    public function it_validates_if_object_passes_predicates()
    {
        $predicates = [
            'a' => \phln\relation\equals('foo'),
            'b' => \phln\collection\contains('foo'),
        ];

        $this->assertTrue($this->callFn($predicates, ['a' => 'foo', 'b' => ['foo']]));
        $this->assertTrue($this->callFn($predicates, ['a' => 'foo', 'b' => ['foo'], 'c' => 2]));
        $this->assertFalse($this->callFn($predicates, ['a' => 'bar', 'b' => ['foo'], 'c' => 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $where = $this->callFn([
            'a' => \phln\relation\equals('foo'),
            'b' => \phln\collection\contains('foo'),
        ]);

        $this->assertTrue($where(['a' => 'foo', 'b' => ['foo']]));
    }
}
