<?php

use Baethon\Phln as p;

class LensIndexTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = p\lens_index(1);

        $this->assertEquals(2, p\view($input, $lens));
    }

    public function test_it_calls_fn_over_value()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = p\lens_index(0);

        $this->assertEquals([2, 2, 3, 4, 5], p\over($input, $lens, p\_(p\inc)));
    }

    public function test_it_sets_value()
    {
        $input = [1, 2, 3, 4, 5];
        $lens = p\lens_index(0);

        $this->assertEquals([3, 2, 3, 4, 5], p\set($input, $lens, 3));
    }
}
