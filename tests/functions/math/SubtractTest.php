<?php

use Baethon\Phln as p;

class SubtractTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_subtracts_number()
    {
        $this->assertEquals(4, p\subtract(7, 3));
    }
}
