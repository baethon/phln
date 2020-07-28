<?php

use Baethon\Phln as p;

class ApplyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_applies_array_to_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };

        $this->assertEquals(42, p\apply($f, [40, 2]));
    }
}
