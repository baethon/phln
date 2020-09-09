<?php

use Baethon\Phln as p;

class DecTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_decrements_value()
    {
        $this->assertEquals(1, p\dec(2));
    }
}
