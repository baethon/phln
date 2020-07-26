<?php

use Baethon\Phln\Phln as P;

class DecTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_decrements_value()
    {
        $this->assertEquals(1, P::dec(2));
    }
}
