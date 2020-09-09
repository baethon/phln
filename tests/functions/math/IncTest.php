<?php

use Baethon\Phln as p;

class IncTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_increments_value()
    {
        $this->assertEquals(3, p\inc(2));
    }
}
