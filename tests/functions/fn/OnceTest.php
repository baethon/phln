<?php

use baethon\phln as p;

class OnceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider onceValueProvider
     * @param mixed $returnValue
     */
    public function test_it_calls_fn_once($returnValue)
    {
        $callCounter = 0;
        $fn = function () use (& $callCounter, $returnValue) {
            $callCounter += 1;
            return $returnValue;
        };

        $f = p\once($fn);

        $this->assertEquals($returnValue, $f());
        $this->assertEquals($returnValue, $f());
        $this->assertEquals(1, $callCounter);
    }

    public function test_it_passes_arguments_to_fn()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };

        $f = p\once($sum);

        $this->assertEquals(5, $f(2, 3));
    }

    public function onceValueProvider()
    {
        return [
            [1],
            [null],
        ];
    }
}
