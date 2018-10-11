<?php

use Baethon\Phln\Phln as P;

class PhlnTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_is_macroable()
    {
        P::macro('foo', function () {
            return 'foo';
        });

        $this->assertEquals('foo', P::foo());
    }

    public function test_adding_macro_aliases()
    {
        P::macro('hello', function (string $name) {
            return "Hello {$name}";
        });

        P::alias('hai', 'hello');

        $this->assertEquals(P::hello('Jon'), P::hai('Jon'));
    }

    public function test_it_returns_ref_to_macro()
    {
        $this->assertTrue(is_callable(P::ref('tap')));
    }

    public function test_it_returns_arity_of_function()
    {
        $this->assertEquals(1, P::arity(function ($a) {}));
        $this->assertEquals(2, P::arity(function ($a, $b) {}));
        $this->assertEquals(1, P::arity(function (...$a) {}));
        $this->assertEquals(2, P::arity(function ($a, ...$b) {}));
    }

    public function test_curry_with_known_arity()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = P::curryN(3, $sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));

        $this->assertEquals($expected, P::curryN(3, $sum, [1, 2, 3]));
    }

    public function test_curry()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = P::curry($sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));

        $this->assertEquals($expected, P::curry($sum, [1, 2, 3]));
    }
}
