<?php

use Baethon\Phln as p;

class AddTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_adds_two_numbers()
    {
        $this->assertEquals(4, p\add(2, 2));
    }
}
