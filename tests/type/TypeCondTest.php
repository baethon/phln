<?php

use const phln\type\typeCond;

class TypeCondTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return typeCond;
    }

    /** @test  */
    public function it_calls_fn_based_on_type()
    {
        $f = $this->callFn([
            ['array', \phln\fn\always('A')],
            ['integer', \phln\fn\always('I')],
            [stdClass::class, \phln\fn\always('STD')],
            [phln\fn\T, \phln\fn\identity],
        ]);

        $this->assertEquals('A', $f([]));
        $this->assertEquals('I', $f(1));
        $this->assertEquals('STD', $f(new stdClass()));
        $this->assertEquals('FOO', $f('FOO'));
    }
}
