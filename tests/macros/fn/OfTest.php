<?php

use const phln\fn\of;

class OfTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return of;
    }

    /** @test */
    public function it_creates_array_of_value()
    {
        $this->assertEquals(['a'], $this->callFn('a'));
    }
}
