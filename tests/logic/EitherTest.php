<?php

use function phln\logic\either;

class EitherTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_one_of_predicates_returns_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function ($i) {
            return 0 === $i % 2;
        };

        $f = either($p, $p2);

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

        $f = either(function ($i) {
            return $i > 10;
        });

        $this->assertTrue($f($p2)(11));
        $this->assertTrue($f($p2)(2));
    }
}
