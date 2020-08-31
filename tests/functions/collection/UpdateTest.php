<?php

use Baethon\Phln as p;

class UpdateTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_updates_array_key()
    {
        $expected = [1, 2, 3, 6, 5];

        $this->assertEquals($expected, p\update([1, 2, 3, 4, 5], 3, 6));
    }

    public function test_it_does_nothing_when_updating_index_out_of_range()
    {
        $this->assertEquals([1, 2, 3], p\update([1, 2, 3], 6, 6));
    }
}
