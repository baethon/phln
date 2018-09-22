<?php
declare(strict_types=1);

namespace phln\fn;

const tap = '\\phln\\fn\\tap';
const 𝑓tap = '\\phln\\fn\\𝑓tap';

/**
 * Runs the given function with the supplied object, then returns the object.
 *
 * @phlnSignature (a -> *) -> a -> a
 * @phlnCategory function
 * @param string|callable $fn
 * @param mixed $value
 * @return \Closure|mixed
 * @example
 *      $dump = \phln\fn\tap('var_dump');
 *      $dump('foo'); // var_dumps('foo'); returns 'foo'
 */
function tap(callable $fn = null, $value = null)
{
    return curryN(2, 𝑓tap, func_get_args());
}

function 𝑓tap(callable $fn, $value)
{
    $fn($value);
    return $value;
}
