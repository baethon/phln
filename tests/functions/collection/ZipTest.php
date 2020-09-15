<?php

use Baethon\Phln as p;

class ZipTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_zips_arrays()
    {
        $left = ['Chair', 'Desk'];
        $right = [199, 300];

        $this->assertEquals([['Chair', 199], ['Desk', 300]], p\zip($left, $right));
    }
}
