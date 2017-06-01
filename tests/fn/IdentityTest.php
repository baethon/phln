<?php

use function phln\fn\identity;

class IdentityTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_passed_value()
    {
        $this->assertEquals(1, identity(1));
    }
}
