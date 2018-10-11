<?php

use Baethon\Phln\Phln as P;

class PathEqTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_value()
    {
        $foo = ['bar' => ['baz' => 1]];
        $this->assertTrue(P::pathEq('bar.baz', 1, $foo));
    }
}
