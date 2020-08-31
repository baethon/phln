<?php

use Baethon\Phln as p;

class PropTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_value_by_index()
    {
        $this->assertEquals(1, p\prop([0, 1], 1));
    }

    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_value_by_key($value)
    {
        $this->assertEquals(1, p\prop($value, 'a'));
        $this->assertNull(p\prop($value, 'b'));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1]],
            [(object) ['a' => 1]],
        ];
    }
}
