<?php

use Baethon\Phln as p;

class DivideTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_divides_values()
    {
        $this->assertEquals(1 / 2, p\divide(1, 2));
    }
}
