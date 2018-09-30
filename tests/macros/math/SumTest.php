<?php

use Baethon\Phln\Phln as P;

class SumTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_sums_numbers_list()
    {
        $this->assertEquals(10, P::sum([1, 2, 3, 4]));
    }
}
