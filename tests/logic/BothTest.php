<?php

use const phln\logic\both;

class BothTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return both;
    }

    /** @test */
    public function it_checks_if_two_predicates_are_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function($i) {
            return $i < 20;
        };

        $this->assertTrue($this->callFn($p, $p2)(11));
        $this->assertFalse($this->callFn($p, $p2)(10));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = $this->callFn(function ($i) {
            return $i > 10;
        });

        $p2 = function ($i) {
            return $i < 20;
        };

        $this->assertTrue($p($p2)(11));
        $this->assertFalse($p($p2)(10));
    }

    /** @test */
    public function it_supports_primitives()
    {
        $this->assertTrue($this->callFn(true, true));
        $this->assertFalse($this->callFn(true, false));
    }
}
