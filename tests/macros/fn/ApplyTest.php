<?php

use Baethon\Phln\Phln as P;

class ApplyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_applies_array_to_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };

        $this->assertEquals(42, P::apply($f, [40, 2]));
    }
}
