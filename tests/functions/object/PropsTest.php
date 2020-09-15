<?php

use Baethon\Phln as p;

class PropsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_defined_props($object)
    {
        $this->assertEquals([2, 3, 1], p\props($object, ['b', 'c', 'a']));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }

    public function test_it_return_undefined_values()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([2, null, 1], p\props($object, ['b', 'd', 'a']));
    }
}
