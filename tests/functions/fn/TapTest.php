<?php

use Baethon\Phln as p;

class TapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calls_function_and_returns_passed_value()
    {
        $argument = null;
        $fn = function ($a) use (& $argument) {
            $argument = $a;
            return true;
        };

        $this->assertEquals('foo', p\tap('foo', $fn));
        $this->assertEquals('foo', $argument);
    }
}
