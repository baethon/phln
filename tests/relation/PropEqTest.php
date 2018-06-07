<?php

use const phln\relation\propEq;

class PropEqTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return propEq;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_checks_value($object)
    {
        $this->assertTrue($this->callFn('name', 'Jon', $object));
        $this->assertFalse($this->callFn('name', 'Arrya', $object));
    }

    public function objectsProvider()
    {
        return [
            [['name' => 'Jon']],
            [(object)['name' => 'Jon']],
        ];
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn('name', 'Jon');
        $this->assertTrue($f(['name' => 'Jon']));
    }
}
