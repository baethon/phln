<?php

use Baethon\Phln as p;
use Baethon\Phln\FixedArityInterface;

class NAryTest extends \PHPUnit\Framework\TestCase
{
    private $fn;

    public function setUp(): void
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
        $result = p\n_ary($n, $this->fn)(...$args);
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

    public function test_it_wraps_fn_in_fixed_arity_wrapper()
    {
        $f = p\n_ary(3, $this->fn);

        $this->assertInstanceOf(FixedArityInterface::class, $f);
        $this->assertEquals(3, $f->getArity());
    }

    public function test_result_wrapper_can_be_curried()
    {
        $f = p\n_ary(3, function (...$args) {
            return array_sum($args);
        });

        $g = p\curry($f);

        $this->assertEquals(4, $g(1)(1, 2));
    }
}
