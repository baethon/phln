<?php

use Baethon\Phln as p;

class CondTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_fn_which_encapsulates_if_else_logic()
    {
        $f = p\cond([
            [p\equals('foo'), p\always('bar')],
            [p\is('bool'), p\identity()],
            [p\T(), p\always('none')],
        ]);

        $this->assertEquals('bar', $f('foo'));
        $this->assertTrue($f(true));
        $this->assertEquals('none', $f('baz'));
    }

    public function test_it_returns_null_when_no_match()
    {
        $f = p\cond([
            [p\F(), p\always('foo')],
        ]);

        $this->assertNull($f('bar'));
    }
}
