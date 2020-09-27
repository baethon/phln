<?php

use Baethon\Phln as p;

class PickTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_picks_given_keys($object)
    {
        $this->assertEquals(['b' => 2], p\pick($object, ['b']));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }

    public function test_it_skips_undefined_keys()
    {
        $this->assertEquals([], p\pick(['a' => 1], ['c']));
    }
}
