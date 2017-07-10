<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use const phln\fn\otherwise;
use function phln\collection\all;
use function phln\fn\{
    always, curryN, throwException, unapply
};
use function phln\type\is;

const both = '\\phln\\logic\\both';
const 𝑓both = '\\phln\\logic\\𝑓both';

/**
 * Returns `true` when both of two provided values are truthy.
 *
 * This function is polymorphic and supports two cases:
 * 1. when both values are predicates it will return wrapper function which call to the two functions in an `&&` operation, returning `true` if both of the functions will return truthy value.
 * 2. when both values are booleans it will return result of `&&` operation
 *
 * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
 * @phlnSignature Boolean -> Boolean -> Boolean
 * @phlnCategory logic
 * @param string|callable|bool $left
 * @param string|callable|bool $right
 * @return \Closure|bool
 * @example
 *      $gt10 = \phln\fn\partial(\phln\relation\gt, [\phln\fn\__, 10]);
 *      $lt20 = \phln\fn\partial(\phln\relation\lt, [\phln\fn\__, 20]);
 *      $f = \phln\logic\both($gt10, $lt20);
 *      $f(12); // true
 *      \phln\logic\both(true, false); // false
 */
function both($left = nil, $right = nil)
{
    return curryN(2, 𝑓both, [$left, $right]);
}

function 𝑓both($left, $right)
{
    $allPrimitives = unapply(all(is('bool')));
    $allCallables = unapply(all(is('callable')));
    $bothPredicate = function (...$args) use ($left, $right) {
        return $left(...$args) && $right(...$args);
    };
    $compareBooleans = function ($left, $right) {
        return $left && $right;
    };

    $f = cond([
        [$allPrimitives, $compareBooleans],
        [$allCallables, always($bothPredicate)],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($left, $right);
}
