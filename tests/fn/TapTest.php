<?php

use const phln\fn\tap;

class TapTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return tap;
    }

    /** @test */
    public function it_calls_function_and_returns_passed_value()
    {
        $argument = null;
        $fn = function ($a) use (& $argument) {
            $argument = $a;
            return true;
        };

        $this->assertEquals('foo', $this->callFn($fn, 'foo'));
        $this->assertEquals('foo', $argument);
    }

    /** @test */
    public function it_is_curried()
    {
        $called = false;
        $f = $this->callFn(function () use (& $called) {
            $called = true;
        });

        $this->assertEquals('foo', $f('foo'));
        $this->assertTrue($called);
    }
}
