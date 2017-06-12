<?php

use const phln\relation\pathEq;

class PathEqTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return pathEq;
    }

    /** @test */
    public function it_checks_value()
    {
        $foo = ['bar' => ['baz' => 1]];
        $this->assertTrue($this->callFn('bar.baz', 1, $foo));
    }

    /** @test */
    public function it_is_curried()
    {
        $foo = ['bar' => ['baz' => 1]];
        $f = $this->callFn('bar.baz', 1);
        $this->assertTrue($f($foo));
    }
}
