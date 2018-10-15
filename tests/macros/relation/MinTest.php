<?php

use Baethon\Phln\Phln as P;

class MinTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_smaller_value()
    {
        $this->assertEquals(-1, P::min(-1, 1));
        $this->assertEquals(-1, P::min(1, -1));
    }
}
