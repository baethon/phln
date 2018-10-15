<?php

use Baethon\Phln\Phln as P;

class OmitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_omits_given_keys($object)
    {
        $this->assertEquals(['b' => 2], P::omit(['a', 'c'], $object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }
}
