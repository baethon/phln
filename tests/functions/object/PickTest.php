<?php

use Baethon\Phln\Phln as P;

class PickTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_picks_given_keys($object)
    {
        $this->assertEquals(['b' => 2], P::pick(['b'], $object));
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
        $this->assertEquals([], P::pick(['c'], ['a' => 1]));
    }
}
