<?php

use Baethon\Phln as p;

class ConcatTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_concatenates_two_arrays()
    {
        $this->assertEquals([1, 2], p\concat([1], [2]));
    }

    public function test_it_concatenates_two_strings()
    {
        $this->assertEquals('ABCD', p\concat('AB', 'CD'));
    }

    /**
     * @dataProvider exceptionsDataProvider
     */
    public function test_it_throws_exception($a, $b)
    {
        $this->expectException(\InvalidArgumentException::class);
        p\concat($a, $b);
    }

    public function exceptionsDataProvider()
    {
        return [
            ['foo', ['bar']],
            [['foo'], 'bar'],
            [1, 2],
        ];
    }
}
