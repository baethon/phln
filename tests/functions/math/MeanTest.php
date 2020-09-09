<?php

use Baethon\Phln as p;

class MeanTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_mean_of_numbers()
    {
        $numbers = [2, 7, 9];
        $this->assertEquals(6, p\mean($numbers));
    }
}
