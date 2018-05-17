<?php

use const phln\object\where;

class WhereTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return where;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_validates_if_object_passes_predicates($a, $b, $c)
    {
        $predicates = [
            'a' => \phln\relation\equals('foo'),
            'b' => \phln\collection\contains('foo'),
        ];

        $this->assertTrue($this->callFn($predicates, $a));
        $this->assertTrue($this->callFn($predicates, $b));
        $this->assertFalse($this->callFn($predicates, $c));
    }

    public function objectsProvider()
    {
        return [
            [
                ['a' => 'foo', 'b' => ['foo']],
                ['a' => 'foo', 'b' => ['foo'], 'c' => 2],
                ['a' => 'bar', 'b' => ['foo'], 'c' => 2]
            ],
            [
                (object) ['a' => 'foo', 'b' => ['foo']],
                (object) ['a' => 'foo', 'b' => ['foo'], 'c' => 2],
                (object) ['a' => 'bar', 'b' => ['foo'], 'c' => 2]
            ],
        ];
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
