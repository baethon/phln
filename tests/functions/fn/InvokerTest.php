<?php

use baethon\phln as p;

class InvokerTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_invokes_method()
    {
        $object = new class ()
        {
            public function foo()
            {
                return 'foo';
            }
        };

        $this->assertEquals('foo', p\invoker(0, 'foo')($object));
    }

    public function test_it_passes_given_arguments()
    {
        $object = new class ()
        {
            public function foo($a, $b, $c)
            {
                return "{$a},{$b},{$c}";
            }
        };

        $f = p\invoker(3, 'foo');

        $this->assertEquals('a,b,c', $f('a', 'b', 'c', $object));
    }

    public function test_it_curries_wrapper_fn()
    {
        $object = new class ()
        {
            public function foo($a, $b, $c)
            {
                return "{$a},{$b},{$c}";
            }
        };

        $f = p\invoker(3, 'foo')('a', 'b');

        $this->assertEquals('a,b,c', $f('c', $object));
    }
}
