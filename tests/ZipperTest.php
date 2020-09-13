<?php

use Baethon\Phln\Zipper;

class ZipperTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_to_array()
    {
        $current = ['a' => 1];
        $this->assertEquals($current, Zipper::of($current)->toArray());
    }

    public function test_it_goes_down_to_property()
    {
        $current = [
            'a' => ['b' => 1],
        ];

        $this->assertEquals($current['a'], Zipper::of($current)->down('a')->toArray());
    }

    public function test_it_goes_down_and_back()
    {
        $current = [
            'a' => [
                'b' => ['c' => 1],
            ],
        ];

        $this->assertEquals($current, Zipper::of($current)
            ->down('a')
            ->down('b')
            ->up()
            ->up()
            ->toArray()
        );
    }

    public function test_it_goes_to_root()
    {
        $current = [
            'a' => [
                'b' => ['c' => 1],
            ],
        ];

        $this->assertEquals($current, Zipper::of($current)
            ->down('a')
            ->down('b')
            ->root()
            ->toArray()
        );
    }

    public function test_it_updates_value()
    {
        $zipper = Zipper::of(['a' => 1]);

        $this->assertEquals(['a' => 2], $zipper->down('a')
            ->update(2)
            ->root()
            ->toArray()
        );
    }

    public function test_it_updates_nested_values()
    {
        $zipper = Zipper::of(['a' => ['b' => ['c' => 1]]]);
        $expected = ['a' => ['b' => ['c' => 2]]];

        $this->assertEquals($expected, $zipper->down('a')
            ->down('b')
            ->down('c')
            ->update(2)
            ->root()
            ->toArray()
        );
    }

    public function test_it_goes_down_and_creates_missing_paths()
    {
        $zipper = Zipper::of(['a' => []]);
        $expected = ['a' => ['b' => ['c' => 1]]];

        $this->assertEquals($expected, $zipper->down('a')
            ->down('b')
            ->down('c')
            ->update(1)
            ->root()
            ->toArray()
        );
    }

    public function test_it_replaces_value()
    {
        $current = [
            'a' => [
                'b' => ['c' => 1],
            ],
        ];

        $this->assertEquals(['a' => ['b' => 1]], Zipper::of($current)
            ->down('a')
            ->down('b')
            ->update(1)
            ->root()
            ->toArray()
        );
    }
}
