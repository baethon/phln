<?php

use Baethon\Phln\Phln as P;

class TrampolineTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calls_recurrent_fn()
    {
        $fn = P::trampoline(function ($i, $carry = []) {
            return $i === 0
                ? $carry
                : $this($i - 1, array_merge($carry, [$i]));
        });

        $this->assertEquals([3, 2, 1], $fn(3));
    }

    public function test_it_stacks_recursive_calls()
    {
        $fn = P::trampoline(function ($i, $sum = 0) {
            return $i === 0
                ? $sum
                : $this($i - 1, $sum + $i);
        });

        // if trampoline uses recursion
        // this should exceed nested calls limit
        // if not - everything is fine
        $this->assertEquals(20100, $fn(200));
    }
}
