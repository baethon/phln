<?php

use Baethon\Phln\CurriedFn;

class CurriedFnTest extends \PHPUnit\Framework\TestCase
{
    private $fn;

    public function setUp()
    {
        parent::setUp();

        $this->fn = function ($a, $b, $c) {
            return $a + $b + $c;
        };
    }

    public function test_it_returns_value_of_fn()
    {
        $this->assertEquals(4, CurriedFn::of($this->fn)(1, 1, 2));
        $this->assertEquals(4, CurriedFn::ofN(3, $this->fn)(1, 1, 2));
    }

    public function test_it_can_be_created_from_other_curried_fn()
    {
        $f = CurriedFn::of($this->fn);
        $g = CurriedFn::of($f);

        $this->assertEquals(3, $g->getArity());
        $this->assertEquals(4, $f(1, 1, 2));

        $this->assertEquals(2, CurriedFn::of($f(1))->getArity());
    }

    public function test_it_curries_fn()
    {
        $f = CurriedFn::of($this->fn);

        $this->assertEquals(4, $f(1)(1)(2));
        $this->assertEquals(4, $f(1, 1)(2));
        $this->assertEquals(4, $f(1)(1, 2));
    }

    public function test_it_returns_partial_arity()
    {
        $f = CurriedFn::of($this->fn);

        $this->assertEquals(3, $f->getArity());
        $this->assertEquals(2, $f(1)->getArity());
        $this->assertEquals(1, $f(1, 2)->getArity());
    }
}
