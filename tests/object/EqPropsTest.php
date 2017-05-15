<?php

use function phln\object\eqProps;
use const phln\object\eqProps;

class EqPropsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_props_are_equal()
    {
        $a = ['a' => 1];
        $this->assertTrue(eqProps('a', $a, ['a' => 1]));
        $this->assertFalse(eqProps('a', $a, ['a' => 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $eq = eqProps('a', ['a' => 1]);
        $this->assertTrue($eq(['a' => 1]));
    }
}
