<?php

use Baethon\Phln\Phln as P;

class OfTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_creates_array_of_value()
    {
        $this->assertEquals(['a'], P::of('a'));
    }
}
