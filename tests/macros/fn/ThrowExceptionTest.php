<?php

use Baethon\Phln\Phln as P;

class ThrowExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_callback_which_throws_exception()
    {
        $this->expectException(\Exception::class);
        $f = P::throwException();

        $f();
    }

    public function test_it_supports_custom_exception_class()
    {
        $this->expectException(\LogicException::class);
        $f = P::throwException(\LogicException::class);
        $f();
    }

    public function test_it_supports_exception_constructor_args()
    {
        $this->expectExceptionMessage('foo');
        $this->expectExceptionCode(100);

        $f = P::throwException(\Exception::class, ['foo', 100]);
        $f();
    }
}
