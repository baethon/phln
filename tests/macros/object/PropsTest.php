<?php

use Baethon\Phln\Phln as P;

class PropsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_defined_props($object)
    {
        $this->assertEquals([2, 3, 1], P::props(['b', 'c', 'a'], $object));
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
        $this->assertEquals([2, null, 1], P::props(['b', 'd', 'a'], $object));
    }

    public function test_it_is_curried()
    {
        $getProps = P::props(['a', 'b']);
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([1, 2], $getProps($object));
    }
}
