<?php
declare(strict_types=1);

namespace phln\fn;

const always = '\\phln\\fn\\always';

/**
 * Returns a function that always returns the given value.
 * For non-primitives the value returned is a reference to the original value.
 *
 * @phlnSignature a -> (* -> a)
 * @phlnCategory function
 * @param $value
 * @return \Closure
 * @example
 *      $foo = \phln\fn\always('foo');
 *      $foo(); // 'foo'
 */
function always($value): \Closure
{
    return function () use ($value) {
        return $value;
    };
}
