<?php

use Baethon\Phln as p;

class MultiplyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_multiplies_two_numbers()
    {
        $this->assertEquals(4, p\multiply(2, 2));
    }
}
