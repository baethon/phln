<?php

use Baethon\Phln\Phln as P;

class UpdateTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_updates_array_key()
    {
        $expected = [1, 2, 3, 6, 5];

        $this->assertEquals($expected, P::update(3, 6, [1, 2, 3, 4, 5]));
    }

    public function test_it_does_nothing_when_updating_index_out_of_range()
    {
        $this->assertEquals([1, 2, 3], P::update(6, 6, [1, 2, 3]));
    }
}
