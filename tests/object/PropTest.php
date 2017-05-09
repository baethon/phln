<?php

use function phln\object\prop;

class PropTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_value_by_index()
    {
        $this->assertEquals(1, prop(1, [0, 1]));
    }

    /** @test */
    public function it_returns_value_by_key()
    {
        $this->assertEquals(1, prop('a', ['a' => 1]));
        $this->assertNull(prop('b', ['a' => 1]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = prop('a');
        $this->assertEquals(1, $f(['a' => 1]));
    }
}
