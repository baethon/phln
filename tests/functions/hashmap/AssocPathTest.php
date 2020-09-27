<?php

use Baethon\Phln as p;
use Baethon\Phln\ObjectWrapper;

class AssocPathTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_sets_value($path, $value, $object, $expected)
    {
        $result = p\assoc_path($object, $path, $value)->toArray();
        $this->assertEquals(ObjectWrapper::of($expected)->toArray(), $result);
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
                'a',
                1,
                ['a' => 0],
                ['a' => 1],
            ],
            [
                'a',
                1,
                (object)['a' => 0],
                ['a' => 1],
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
                ['a' => ['b' => ['c' => 1]]],
            ],
            [
                'a.b.c',
                3,
                ['a' => []],
                ['a' => ['b' => ['c' => 3]]],
            ],
        ];
    }
}
