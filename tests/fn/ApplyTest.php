<?php

use function phln\fn\apply;

class ApplyTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_applies_array_to_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };

        $this->assertEquals(42, apply($f, [40, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = apply(function ($a, $b) {
            return $a + $b;
        });

        $this->assertEquals(42, $f([40, 2]));
    }
}
