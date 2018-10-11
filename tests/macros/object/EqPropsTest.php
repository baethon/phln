<?php

use Baethon\Phln\Phln as P;

class EqPropsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_checks_if_props_are_equal($a)
    {
        $this->assertTrue(P::eqProps('a', $a, ['a' => 1]));
        $this->assertFalse(P::eqProps('a', $a, ['a' => 2]));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1]],
            [(object) ['a' => 1]],
        ];
    }

    public function test_it_is_curried()
    {
        $eq = P::eqProps('a', ['a' => 1]);
        $this->assertTrue($eq(['a' => 1]));
    }
}
