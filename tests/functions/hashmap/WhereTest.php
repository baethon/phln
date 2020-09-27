<?php

use Baethon\Phln as p;

class WhereTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_validates_if_object_passes_predicates($a, $b, $c)
    {
        $predicates = [
            'a' => p\_(p\equals, 'foo'),
            'b' => p\_(p\contains, 'foo'),
        ];

        $this->assertTrue(p\where($a, $predicates));
        $this->assertTrue(p\where($b, $predicates));
        $this->assertFalse(p\where($c, $predicates));
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

    public function test_it_supports_scalars()
    {
        $this->assertTrue(p\where(['foo' => 'bar', 'baz' => 'bah'], ['foo' => 'bar']));
    }
}
