<?php

use const phln\fn\invoker;

class InvokerTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return invoker;
    }

    /** @test  */
    public function it_invokes_method()
    {
        $object = new class ()
        {
            public function foo()
            {
                return 'foo';
            }
        };

        $this->assertEquals('foo', $this->callFn(0, 'foo')($object));
    }

    /** @test */
    public function it_passes_given_arguments()
    {
        $object = new class ()
        {
            public function foo($a, $b, $c)
            {
                return "{$a},{$b},{$c}";
            }
        };

        $f = $this->callFn(3, 'foo');

        $this->assertEquals('a,b,c', $f('a', 'b', 'c', $object));
    }

    /** @test */
    public function it_curries_wrapper_fn()
    {
        $object = new class ()
        {
            public function foo($a, $b, $c)
            {
                return "{$a},{$b},{$c}";
            }
        };

        $f = $this->callFn(3, 'foo')('a', 'b');

        $this->assertEquals('a,b,c', $f('c', $object));
    }
}
