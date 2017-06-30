<?php

use const phln\collection\length;

class LengthTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return length;
    }

    /** @test  */
    public function it_returns_length_of_array()
    {
        $this->assertEquals(3, $this->callFn([1, 2, 3]));
    }

    /** @test */
    public function it_returns_length_of_string()
    {
        $this->assertEquals(5, $this->callFn('lorem'));
    }
}
