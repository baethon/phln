<?php

use const phln\object\eqProps;

class EqPropsTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return eqProps;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_checks_if_props_are_equal($a)
    {
        $this->assertTrue($this->callFn('a', $a, ['a' => 1]));
        $this->assertFalse($this->callFn('a', $a, ['a' => 2]));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1]],
            [(object) ['a' => 1]],
        ];
    }

    /** @test */
    public function it_is_curried()
    {
        $eq = $this->callFn('a', ['a' => 1]);
        $this->assertTrue($eq(['a' => 1]));
    }
}
