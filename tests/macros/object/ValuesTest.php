<?php

use Baethon\Phln\Phln as P;

class ValuesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_values($object)
    {
        $this->assertEquals([1, 2, 3], P::values($object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }
}
