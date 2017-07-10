<?php

use const phln\logic\either;

class EitherTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return either;
    }

    /** @test */
    public function it_checks_if_one_of_predicates_returns_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function ($i) {
            return 0 === $i % 2;
        };

        $f = $this->callFn($p, $p2);

        $this->assertTrue($f(11));
        $this->assertTrue($f(2));
        $this->assertFalse($f(3));
        $this->assertFalse($f(9));
    }

    /** @test */
    public function it_is_curried()
    {
        $p2 = function ($i) {
            return 0 === $i % 2;
        };

        $f = $this->callFn(function ($i) {
            return $i > 10;
        });

        $this->assertTrue($f($p2)(11));
        $this->assertTrue($f($p2)(2));
    }

    /** @test */
    public function it_supports_primitives()
    {
        $this->assertTrue($this->callFn(true, true));
        $this->assertTrue($this->callFn(true, false));
        $this->assertFalse($this->callFn(false, false));
    }
}
