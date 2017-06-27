<?php

use const phln\fn\throwException;

class ThrowExceptionTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return throwException;
    }

    /** @test  */
    public function it_returns_callback_which_throws_exception()
    {
        $this->expectException(\Exception::class);
        $f = $this->callFn();

        $f();
    }

    /** @test */
    public function it_supports_custom_exception_class()
    {
        $this->expectException(\LogicException::class);
        $f = $this->callFn(\LogicException::class);
        $f();
    }

    /** @test */
    public function it_supports_exception_constructor_args()
    {
        $this->expectExceptionMessage('foo');
        $this->expectExceptionCode(100);

        $f = $this->callFn(\Exception::class, ['foo', 100]);
        $f();
    }
}
