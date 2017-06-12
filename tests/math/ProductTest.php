<?php

use const phln\math\product;

class ProductTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return product;
    }

    /** @test */
    public function it_multiplies_elements_of_list()
    {
        $numbers = [2, 4, 6, 8, 100, 1];
        $this->assertEquals(38400, $this->callFn($numbers));
    }

    /** @test */
    public function it_is_curried()
    {
        $product = $this->callFn();
        $numbers = [2, 4, 6, 8, 100, 1];
        $this->assertEquals(38400, $product($numbers));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [2, 4, 6, 8, 100, 1];
        $result = call_user_func($this->getResolvedFn(), $numbers);
        $this->assertEquals(38400, $result);
    }
}
