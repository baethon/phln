<?php

use const phln\object\prop;

class PropTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return prop;
    }

    /** @test */
    public function it_returns_value_by_index()
    {
        $this->assertEquals(1, $this->callFn(1, [0, 1]));
    }

    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_returns_value_by_key($value)
    {
        $this->assertEquals(1, $this->callFn('a', $value));
        $this->assertNull($this->callFn('b', $value));
    }

    public function objectsProvider()
    {
        return [
            [['a' => 1]],
            [(object) ['a' => 1]],
        ];
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn('a');
        $this->assertEquals(1, $f(['a' => 1]));
    }
}
