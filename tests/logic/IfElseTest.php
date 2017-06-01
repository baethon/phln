<?php

use function phln\logic\ifElse;

class IfElseTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_runs_callback_on_met_condition()
    {
        $f = ifElse(
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

    /** @test */
    public function it_is_curried()
    {
        $p = ifElse(function ($i) {
            return $i % 15 === 0;
        });

        $fizzbuzz = $p(
            function () {
                return 'fizzbuzz';
            },
            function ($i) {
                return $i;
            }
        );

        $this->assertEquals('fizzbuzz', $fizzbuzz(15));
        $this->assertEquals(1, $fizzbuzz(1));
    }
}
