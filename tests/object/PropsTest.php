<?php

use function phln\object\props;
use const phln\object\props;

class PropsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_defined_props()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([2, 3, 1], props(['b', 'c', 'a'], $object));
    }

    /** @test */
    public function it_return_undefined_values()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([2, null, 1], props(['b', 'd', 'a'], $object));
    }

    /** @test */
    public function it_is_curried()
    {
        $getProps = props(['a', 'b']);
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([1, 2], $getProps($object));
    }
}
