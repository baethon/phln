<?php

use const phln\object\objOf;

class ObjOfTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return objOf;
    }

    /** @test  */
    public function it_creates_object()
    {
        $this->assertEquals(['foo' => 'bar'], $this->callFn('foo', 'bar'));
    }

    /** @test */
    public function it_is_curried()
    {
        $makeFoo = $this->callFn('foo');
        $this->assertEquals(['foo' => 'bar'], $makeFoo('bar'));
    }
}
