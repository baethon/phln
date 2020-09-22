<?php

use Baethon\Phln as p;

class MinTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_smaller_value()
    {
        $this->assertEquals(-1, p\min(-1, 1));
        $this->assertEquals(-1, p\min(1, -1));
    }
}
