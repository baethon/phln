<?php

use Baethon\Phln\Phln as P;

class IdentityTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_passed_value()
    {
        $this->assertEquals(1, P::identity(1));
    }
}
