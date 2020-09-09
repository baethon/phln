<?php

use Baethon\Phln as p;

class IfElseTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_runs_callback_on_met_condition()
    {
        $f = p\if_else(
            function ($a, $b) {
                return $a + $b === 6;
            },
            function () {
                return 'win';
            },
            function ($a, $b) {
                return compact('a', 'b');
            }
        );

        $this->assertEquals('win', $f(2, 4));
        $this->assertEquals(['a' => 1, 'b' => 2], $f(1, 2));
    }
}
