<?php

use Baethon\Phln as p;

class ClampTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider clampValuesProvider
     */
    public function test_it_restricts_values_to_range($expected, $value, $min, $max)
    {
        $this->assertEquals($expected, p\clamp($value, $min, $max));
    }

    public function clampValuesProvider()
    {
        return [
            [-1, -100, -1, 1],
            [1, 100, -1, 1],
            [0, 0, -1, 1],
            [-1, -1, -1, 1],
            [1, 1, -1, 1],
        ];
    }
}
