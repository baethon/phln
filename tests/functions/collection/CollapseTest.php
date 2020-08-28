<?php

use Baethon\Phln as p;

class CollapseTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_flattens_array_by_one_level()
    {
        $this->assertEquals([1, 2, [3]], p\collapse([[1], [2], [[3]]]));
        $this->assertEquals([1, 2, [3]], p\collapse([[1, 2], [[3]]]));
    }
}
