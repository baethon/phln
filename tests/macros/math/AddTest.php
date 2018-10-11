<?php

use Baethon\Phln\Phln as P;

class AddTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_adds_two_numbers()
    {
        $this->assertEquals(4, P::add(2, 2));
    }
}
