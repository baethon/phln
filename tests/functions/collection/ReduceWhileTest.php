<?php

use Baethon\Phln as p;

class ReduceWhileTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_last_value()
    {
        $result = p\reduce_while(
            p\range(1, 10),
            function ($carry, $i) {
                return ['cont', $i];
            }
        );

        $this->assertEquals(9, $result);
    }

    public function test_it_halts_iterations()
    {
        $result = p\reduce_while(
            p\range(1, 10),
            function ($carry, $i) {
                return $i < 3
                    ? ['cont', $carry + $i]
                    : ['halt', $carry + $i];
            },
            0
        );

        $this->assertEquals(6, $result);
    }
}
