<?php

use const phln\object\props;

class PropsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return props;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_returns_defined_props($object)
    {
        $this->assertEquals([2, 3, 1], $this->callFn(['b', 'c', 'a'], $object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }

    /** @test */
    public function it_return_undefined_values()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([2, null, 1], $this->callFn(['b', 'd', 'a'], $object));
    }

    /** @test */
    public function it_is_curried()
    {
        $getProps = $this->callFn(['a', 'b']);
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->assertEquals([1, 2], $getProps($object));
    }
}
