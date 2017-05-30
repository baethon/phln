<?php

use function phln\relation\pathEq;

class PathEqTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_value()
    {
        $foo = ['bar' => ['baz' => 1]];
        $this->assertTrue(pathEq('bar.baz', 1, $foo));
    }

    /** @test */
    public function it_is_curried()
    {
        $foo = ['bar' => ['baz' => 1]];
        $f = pathEq('bar.baz', 1);
        $this->assertTrue($f($foo));
    }
}
