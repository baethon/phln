<?php

use Baethon\Phln\Phln as P;

class CondTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_fn_which_encapsulates_if_else_logic()
    {
        $f = P::cond([
            [P::equals('foo'), P::always('bar')],
            [P::is('bool'), P::identity()],
            [P::T(), P::always('none')],
        ]);

        $this->assertEquals('bar', $f('foo'));
        $this->assertTrue($f(true));
        $this->assertEquals('none', $f('baz'));
    }

    public function test_it_returns_null_when_no_match()
    {
        $f = P::cond([
            [P::F(), P::always('foo')],
        ]);

        $this->assertNull($f('bar'));
    }
}
