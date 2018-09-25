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
}
