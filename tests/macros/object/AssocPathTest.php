<?php

use Baethon\Phln\Phln as P;

class AssocPathTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_sets_value($path, $value, $object, $expected)
    {
        $result = P::assocPath($path, $value, $object);

        $this->assertEquals($expected, $result);
        $this->assertNotSame($object, $result);
    }

    public function objectsProvider()
    {
        return [
            [
                'a.b.c',
                3,
                ['a' => ['b' => ['d' => 4]]],
                ['a' => ['b' => ['c' => 3, 'd' => 4]]],
            ],
            [
                'a.b.c',
                3,
                ['a' => ['b' => (object)['d' => 4]]],
                ['a' => ['b' => (object)['c' => 3, 'd' => 4]]],
            ],
            [
                'a',
                1,
                ['a' => 0],
                ['a' => 1],
            ],
            [
                'a',
                1,
                (object)['a' => 0],
                (object)['a' => 1],
            ],
            [
                'a.b.c',
                1,
                [],
                ['a' => ['b' => ['c' => 1]]],
            ],
            [
                'a.b.c',
                1,
                new stdClass,
                (object)['a' => (object)['b' => (object)['c' => 1]]],
            ],
            [
                'a.b.c',
                3,
                ['a' => []],
                ['a' => ['b' => ['c' => 3]]],
            ],
            [
                'a.b.c',
                3,
                ['a' => new stdClass],
                ['a' => (object)['b' => (object)['c' => 3]]],
            ],
        ];
    }
}
