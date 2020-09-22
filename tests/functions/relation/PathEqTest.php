<?php

use Baethon\Phln as p;

class PathEqTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_value()
    {
        $foo = ['bar' => ['baz' => 1]];
        $this->assertTrue(p\path_eq($foo, 'bar.baz', 1));
    }
}
