<?php

use Baethon\Phln as p;

class IdentityTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_passed_value()
    {
        $this->assertEquals(1, p\identity(1));
    }
}
