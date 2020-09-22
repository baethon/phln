<?php

use Baethon\Phln as p;

class LensPropTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $lens = p\lens_prop('name');

        $this->assertEquals('Jon', p\view(['name' => 'Jon'], $lens));
    }

    public function test_it_calls_fn_over_value()
    {
        $lens = p\lens_prop('name');
        $this->assertEquals(['name' => 'Array'], p\over(['name' => ''], $lens, p\always('Array')));
    }

    public function test_it_sets_value()
    {
        $lens = p\lens_prop('name');
        $this->assertEquals(['name' => 'Jon'], p\set(['name' => ''], $lens, 'Jon'));
    }
}
