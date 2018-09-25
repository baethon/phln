<?php

use const phln\object\omit;

class OmitTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return omit;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_omits_given_keys($object)
    {
        $this->assertEquals(['b' => 2], $this->callFn(['a', 'c'], $object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }

    /** @test */
    public function it_is_curried()
    {
        $object = ['a' => 1, 'b' => 2, 'c' => 3];
        $removeAC = $this->callFn(['a', 'c']);
        $this->assertEquals(['b' => 2], $removeAC($object));
    }
}
