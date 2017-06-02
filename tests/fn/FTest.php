<?php

use function phln\fn\F;

class FTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_false()
    {
        $this->assertFalse(F());
    }
}
