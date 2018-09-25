<?php

use const phln\fn\identity;

class IdentityTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return identity;
    }

    /** @test */
    public function it_returns_passed_value()
    {
        $this->assertEquals(1, $this->callFn(1));
    }
}
