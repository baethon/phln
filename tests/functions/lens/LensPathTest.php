<?php

use Baethon\Phln as p;

class LensPathTest extends \PHPUnit\Framework\TestCase
{
    private $input = [
        'name' => 'Array',
        'house' => [
            'name' => 'Stark',
        ],
    ];

    public function test_it_views_value()
    {
        $lens = p\lens_path('house.name');

        $this->assertEquals('Stark', p\view($this->input, $lens));
    }

    public function test_it_calls_fn_over_value()
    {
        $lens = p\lens_path('house.name');
        $expected = array_merge($this->input, [
            'house' => [
                'name' => 'HOUSE OF NO NAME',
            ],
        ]);

        $this->assertEquals($expected, p\over($this->input, $lens, p\always('HOUSE OF NO NAME')));
    }

    public function test_it_sets_value()
    {
        $lens = p\lens_path('house.name');
        $expected = array_merge($this->input, [
            'house' => [
                'name' => 'HOUSE OF NO NAME',
            ],
        ]);

        $this->assertEquals($expected, p\set($this->input, $lens, 'HOUSE OF NO NAME'));
    }
}
