<?php

use Baethon\Phln as p;

class DifferenceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_diff()
    {
        $this->assertEquals([2, 3, 4], p\difference([1, 2, 3, 4], [1]));
    }
}
