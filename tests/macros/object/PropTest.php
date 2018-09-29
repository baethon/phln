<?php

use Baethon\Phln\Phln as P;

class PropTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_value_by_index()
    {
        $this->assertEquals(1, P::prop(1, [0, 1]));
    }

    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_value_by_key($value)
    {
        $this->assertEquals(1, P::prop('a', $value));
        $this->assertNull(P::prop('b', $value));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1]],
            [(object) ['a' => 1]],
        ];
    }

    public function test_it_is_curried()
    {
        $f = P::prop('a');
        $this->assertEquals(1, $f(['a' => 1]));
    }
}
