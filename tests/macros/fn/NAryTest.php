<?php

use Baethon\Phln\Phln as P;

class NAryTest extends \PHPUnit\Framework\TestCase
{
    private $fn;

    public function setUp()
    {
        $this->fn = function (...$args) {
            return $args;
        };
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_it_converts_fn_to_n_ary($n, $args)
    {
        $result = P::nAry($n, $this->fn)(...$args);
        $this->assertCount($n, $result);
    }

    public function dataProvider()
    {
        return [
            [1, range(0, 10)],
            [2, range(0, 10)],
            [3, range(0, 10)],
            [4, range(0, 10)],
            [5, range(0, 10)],
        ];
    }
}
