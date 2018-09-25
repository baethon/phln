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

    public function test_it_allows_to_define_curried_macro()
    {
        P::curried('foo', 2, function ($a, $b) {
            return $a + $b;
        });

        $f = P::foo(1);

        $this->assertEquals(3, $f(2));
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
        $this->assertEquals(P::class.'::tap', P::ref('tap'));
    }
}
