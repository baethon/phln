<?php

use function phln\fn\tap;

class TapTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_calls_function_and_returns_passed_value()
    {
        $argument = null;
        $fn = function ($a) use (& $argument) {
            $argument = $a;
            return true;
        };

        $this->assertEquals('foo', tap($fn, 'foo'));
        $this->assertEquals('foo', $argument);
    }

    /** @test */
    public function it_is_curried()
    {
        $called = false;
        $f = tap(function () use (& $called) {
            $called = true;
        });

        $this->assertEquals('foo', $f('foo'));
        $this->assertTrue($called);
    }
}
