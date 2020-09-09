<?php

use Baethon\Phln as p;

class MaxTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_bigger_value()
    {
        $this->assertEquals(1, p\max(-1, 1));
        $this->assertEquals(1, p\max(1, -1));
    }
}
