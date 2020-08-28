<?php

use Baethon\Phln as p;

class NthTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_element_on_given_index()
    {
        $this->assertEquals(2, p\nth([1, 2, 3], 1));
    }

    public function test_it_returns_element_on_given_negative_index()
    {
        $this->assertEquals(3, p\nth([1, 2, 3], -1));
    }

    public function test_it_returns_null_when_element_is_not_defined()
    {
        $this->assertNull(p\nth([1, 2, 3], 1000));
    }
}
