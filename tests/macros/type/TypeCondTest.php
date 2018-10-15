<?php

use Baethon\Phln\Phln as P;

class TypeCondTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_calls_fn_based_on_type()
    {
        $f = P::typeCond([
            ['array', P::always('A')],
            ['integer', P::always('I')],
            [stdClass::class, P::always('STD')],
            [P::ref('T'), P::ref('identity')],
        ]);

        $this->assertEquals('A', $f([]));
        $this->assertEquals('I', $f(1));
        $this->assertEquals('STD', $f(new stdClass()));
        $this->assertEquals('FOO', $f('FOO'));
    }
}
