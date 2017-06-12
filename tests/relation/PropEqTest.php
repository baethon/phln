<?php

use const phln\relation\propEq;

class PropEqTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return propEq;
    }

    /** @test */
    public function it_checks_value()
    {
        $this->assertTrue($this->callFn('name', 'Jon', ['name' => 'Jon']));
        $this->assertFalse($this->callFn('name', 'Arrya', ['name' => 'Jon']));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn('name', 'Jon');
        $this->assertTrue($f(['name' => 'Jon']));
    }
}
