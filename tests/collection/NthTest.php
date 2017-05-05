<?php

use function phln\collection\nth;

class NthTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_element_on_given_index()
    {
        $this->assertEquals(2, nth(1, [1, 2, 3]));
    }

    /** @test */
    public function it_returns_element_on_given_negative_index()
    {
        $this->assertEquals(3, nth(-1, [1, 2, 3]));
    }

    /** @test */
    public function it_returns_null_when_element_is_not_defined()
    {
        $this->assertNull(nth(1000, [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = nth(1);
        $this->assertEquals(2, $f([1, 2, 3]));
    }
}
