<?php

use Baethon\Phln\Phln as P;

class ObjOfTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_creates_object()
    {
        $this->assertEquals(['foo' => 'bar'], P::objOf('foo', 'bar'));
    }

    public function test_it_is_curried()
    {
        $makeFoo = P::objOf('foo');
        $this->assertEquals(['foo' => 'bar'], $makeFoo('bar'));
    }
}
