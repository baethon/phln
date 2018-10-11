<?php

use Baethon\Phln\Phln as P;

class WhereTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_validates_if_object_passes_predicates($a, $b, $c)
    {
        $predicates = [
            'a' => P::equals('foo'),
            'b' => P::contains('foo'),
        ];

        $this->assertTrue(P::where($predicates, $a));
        $this->assertTrue(P::where($predicates, $b));
        $this->assertFalse(P::where($predicates, $c));
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

    public function test_it_is_curried()
    {
        $where = P::where([
            'a' => P::equals('foo'),
            'b' => P::contains('foo'),
        ]);

        $this->assertTrue($where(['a' => 'foo', 'b' => ['foo']]));
    }
}
