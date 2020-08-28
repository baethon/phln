<?php

use Baethon\Phln as p;

class JoinTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_joins_array_elements()
    {
        $this->assertEquals('1,2,3', p\join([1, 2, 3], ','));
    }
}
