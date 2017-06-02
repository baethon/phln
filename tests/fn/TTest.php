<?php

use function phln\fn\T;

class TTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_true()
    {
        $this->assertTrue(T());
    }
}
