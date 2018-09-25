<?php

use const phln\collection\nth;

class NthTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return nth;
    }

    /** @test */
    public function it_returns_element_on_given_index()
    {
        $this->assertEquals(2, $this->callFn(1, [1, 2, 3]));
    }

    /** @test */
    public function it_returns_element_on_given_negative_index()
    {
        $this->assertEquals(3, $this->callFn(-1, [1, 2, 3]));
    }

    /** @test */
    public function it_returns_null_when_element_is_not_defined()
    {
        $this->assertNull($this->callFn(1000, [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);
        $this->assertEquals(2, $f([1, 2, 3]));
    }
}
