<?php

use Baethon\Phln\Phln as P;

class ClampTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_restricts_values_to_range()
    {
        $this->assertEquals(-1, P::clamp(-1, 1, -100));
        $this->assertEquals(1, P::clamp(-1, 1, 100));
        $this->assertEquals(0, P::clamp(-1, 1, 0));
        $this->assertEquals(-1, P::clamp(-1, 1, -1));
        $this->assertEquals(1, P::clamp(-1, 1, 1));
    }
}
