<?php

use const phln\object\pick;

class PickTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return pick;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_picks_given_keys($object)
    {
        $this->assertEquals(['b' => 2], $this->callFn(['b'], $object));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 2, 'c' => 3]],
            [(object) ['a' => 1, 'b' => 2, 'c' => 3]],
        ];
    }

    /** @test */
    public function it_skips_undefined_keys()
    {
        $this->assertEquals([], $this->callFn(['c'], ['a' => 1]));
    }

    /** @test */
    public function it_is_curried()
    {
        $pickA = $this->callFn(['a']);
        $this->assertEquals(['a' => 1], $pickA(['a' => 1, 'b' => 2]));
    }
}
