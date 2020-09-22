<?php

use Baethon\Phln as p;

class UniqueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider uniqueValuesProvider
     */
    public function test_it_returns_unique_elements($expected, $collection)
    {
        $this->assertEquals($expected, p\unique($collection));
    }

    public function uniqueValuesProvider()
    {
        return [
            [[1, 3, 2], [1, 3, 3, 2, 1, 1]],
            [[1, '1'], [1, '1', 1]],
            [[[42]], [[42], [42]]],
        ];
    }
}
