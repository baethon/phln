<?php

use Baethon\Phln as p;

class MedianTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_finds_median_of_odd_length_array()
    {
        $numbers = [7, 2, 9];
        $this->assertEquals(7, p\median($numbers));
    }

    public function test_it_finds_median_of_even_length_array()
    {
        $numbers = [7, 2, 10, 9];
        $this->assertEquals(8, p\median($numbers));
    }
}
