<?php

use Baethon\Phln\Phln as P;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_multiplies_elements_of_list()
    {
        $numbers = [2, 4, 6, 8, 100, 1];
        $this->assertEquals(38400, P::product($numbers));
    }
}
