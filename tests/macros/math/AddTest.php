<?php

use Baethon\Phln\Phln as P;

class AddTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_adds_two_numbers()
    {
        $this->assertEquals(4, P::add(2, 2));
    }

    public function test_it_is_curried()
    {
        $addFive = P::add(5);
        $this->assertEquals(7, $addFive(2));
    }
}
