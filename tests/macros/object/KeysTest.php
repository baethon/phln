<?php

use const phln\object\keys;

class KeysTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return keys;
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_returns_keys_from_array($value)
    {
        $this->assertEquals(['a', 'b'], $this->callFn($value));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1, 'b' => 1]],
            [(object) ['a' => 1, 'b' => 1]],
        ];
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(['a', 'b'], call_user_func($this->getResolvedFn(), ['a' => 1, 'b' => 1]));
    }
}
