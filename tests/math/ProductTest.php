<?php

use function phln\math\product;
use const phln\math\product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_multiplies_elements_of_list()
    {
        $numbers = [2, 4, 6, 8, 100, 1];
        $this->assertEquals(38400, product($numbers));
    }

    /** @test */
    public function it_is_curried()
    {
        $product = product();
        $numbers = [2, 4, 6, 8, 100, 1];
        $this->assertEquals(38400, $product($numbers));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [2, 4, 6, 8, 100, 1];
        $result = call_user_func(product, $numbers);
        $this->assertEquals(38400, $result);
    }
}
