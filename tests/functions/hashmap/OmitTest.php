<?php

use Baethon\Phln as p;

class OmitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_omits_given_keys($object)
    {
        $this->assertEquals(['b' => 2], p\omit($object, ['a', 'c']));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }
}
