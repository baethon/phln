<?php

use Baethon\Phln\Phln as P;

class MeanTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_mean_of_numbers()
    {
        $numbers = [2, 7, 9];
        $this->assertEquals(6, P::mean($numbers));
    }
}
