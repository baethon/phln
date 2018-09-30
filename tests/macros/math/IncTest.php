<?php

use Baethon\Phln\Phln as P;

class IncTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_increments_value()
    {
        $this->assertEquals(3, P::inc(2));
    }
}
