<?php

use Baethon\Phln as p;

class PropTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_returns_defined_props($object)
    {
        $this->assertEquals(2, p\prop($object, 'b'));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }
}
