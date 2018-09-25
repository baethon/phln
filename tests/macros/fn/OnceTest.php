<?php

use const phln\fn\once;

class OnceTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return once;
    }

    /**
     * @test
     * @dataProvider onceValueProvider
     * @param mixed $returnValue
     */
    public function it_calls_fn_once($returnValue)
    {
        $callCounter = 0;
        $fn = function () use (& $callCounter, $returnValue) {
            $callCounter += 1;
            return $returnValue;
        };

        $f = $this->callFn($fn);

        $this->assertEquals($returnValue, $f());
        $this->assertEquals($returnValue, $f());
        $this->assertEquals(1, $callCounter);
    }

    /** @test */
    public function it_passes_arguments_to_fn()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };

        $f = $this->callFn($sum);

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
