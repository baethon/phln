<?php

use function phln\logic\cond;

class CondTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_fn_which_encapsulates_if_else_logic()
    {
        $f = cond([
            [\phln\relation\equals('foo'), \phln\fn\always('bar')],
            [\phln\type\is('bool'), \phln\fn\identity],
            [\phln\fn\T, \phln\fn\always('none')],
        ]);

        $this->assertEquals('bar', $f('foo'));
        $this->assertTrue($f(true));
        $this->assertEquals('none', $f('baz'));
    }

    /** @test */
    public function it_returns_null_when_no_match()
    {
        $f = cond([
            [\phln\relation\equals('foo'), \phln\fn\always('bar')],
        ]);

        $this->assertNull($f('bar'));
    }
}
