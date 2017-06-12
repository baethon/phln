<?php

use const phln\fn\F;

class FTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return F;
    }

    /** @test */
    public function it_returns_false()
    {
        $this->assertFalse($this->callFn());
    }
}
