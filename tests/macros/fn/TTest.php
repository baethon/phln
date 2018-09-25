<?php

use const phln\fn\T;

class TTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return T;
    }

    /** @test */
    public function it_returns_true()
    {
        $this->assertTrue($this->callFn());
    }
}
