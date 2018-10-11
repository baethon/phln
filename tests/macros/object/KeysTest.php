<?php

use Baethon\Phln\Phln as P;

class KeysTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_keys_from_array($value)
    {
        $this->assertEquals(['a', 'b'], P::keys($value));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 1]],
            [(object) ['a' => 1, 'b' => 1]],
        ];
    }
}
