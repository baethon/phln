<?php

use const phln\fn\apply;

class ApplyTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return apply;
    }

    /** @test */
    public function it_applies_array_to_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };

        $this->assertEquals(42, $this->callFn($f, [40, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($a, $b) {
            return $a + $b;
        });

        $this->assertEquals(42, $f([40, 2]));
    }
}
