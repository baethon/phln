<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use function phln\fn\curryN;

const either = '\\phln\\logic\\either';
const 𝑓either = '\\phln\\logic\\𝑓either';

/**
 * A function wrapping calls to the two functions in an `||` operation, returning `true` if at least one of the functions will return truthy value.
 *
 * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
 * @param string|callable $left
 * @param string|callable $right
 * @return \Closure
 * @example
 *      $lt10 = \phln\fn\partial(\phln\relation\lt, [\phln\fn\__, 10]);
 *      $gt20 = \phln\fn\partial(\phln\relation\gt, [\phln\fn\__, 20]);
 *      $f = \phln\logic\either($lt10, $gt20);
 *      $f(12); // false
 *      $f(9); // true
 *      $f(21); // true
 */
function either($left = nil, $right = nil): \Closure
{
    return curryN(2, 𝑓either, [$left, $right]);
}

function 𝑓either(callable $left, callable $right): \Closure
{
    return function (...$args) use ($left, $right) {
        return $left(...$args) || $right(...$args);
    };
}
