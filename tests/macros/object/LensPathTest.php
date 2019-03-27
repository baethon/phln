<?php

use Baethon\Phln\Phln as P;

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
        $lens = P::lensPath('house.name');

        $this->assertEquals('Stark', P::view($lens, $this->input));
    }

    public function test_it_calls_fn_over_value()
    {
        $lens = P::lensPath('house.name');
        $expected = array_merge($this->input, [
            'house' => [
                'name' => 'HOUSE OF NO NAME',
            ],
        ]);

        $this->assertEquals($expected, P::over($lens, P::always('HOUSE OF NO NAME'), $this->input));
    }

    public function test_it_sets_value()
    {
        $this->markTestIncomplete('Missing P::set() macro');
        $lens = P::lensPath('house.name');
        $expected = array_merge($this->input, [
            'house' => [
                'name' => 'HOUSE OF NO NAME',
            ],
        ]);

        $this->assertEquals($expected, P::set($lens, 'HOUSE OF NO NAME', $this->input));
    }
}
