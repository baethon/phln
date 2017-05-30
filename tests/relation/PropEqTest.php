<?php

use function phln\relation\propEq;

class PropEqTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_value()
    {
        $this->assertTrue(propEq('name', 'Jon', ['name' => 'Jon']));
        $this->assertFalse(propEq('name', 'Arrya', ['name' => 'Jon']));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = propEq('name', 'Jon');
        $this->assertTrue($f(['name' => 'Jon']));
    }
}
