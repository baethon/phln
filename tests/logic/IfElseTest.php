<?php

use const phln\logic\ifElse;

class IfElseTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return ifElse;
    }

    /** @test */
    public function it_runs_callback_on_met_condition()
    {
        $f = $this->callFn(
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
        $p = $this->callFn(function ($i) {
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
