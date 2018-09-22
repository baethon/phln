<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\otherwise;
use function phln\collection\all;
use function phln\fn\{
    always, curryN, throwException, unapply
};
use function phln\type\is;

const either = '\\phln\\logic\\either';
const 𝑓either = '\\phln\\logic\\𝑓either';

/**
 * Returns `true` when one of two provided values is truthy.
 *
 * This function is polymorphic and supports two cases:
 * 1. when both values are predicates it will return wrapper function which call to the two functions in an `||` operation, returning `true` if at least one of the functions will return truthy value.
 * 2. when both values are booleans it will return result of `||` operation
 *
 * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
 * @phlnSignature Boolean -> Boolean -> Boolean
 * @phlnCategory logic
 * @param string|callable|bool $left
 * @param string|callable|bool $right
 * @return \Closure|bool
 * @example
 *      $lt10 = \phln\fn\partial(\phln\relation\lt, [\phln\fn\__, 10]);
 *      $gt20 = \phln\fn\partial(\phln\relation\gt, [\phln\fn\__, 20]);
 *      $f = \phln\logic\either($lt10, $gt20);
 *      $f(12); // false
 *      $f(9); // true
 *      $f(21); // true
 *      \phln\login\either(true, false); // true
 */
function either($left = null, $right = null)
{
    return curryN(2, 𝑓either, func_get_args());
}

function 𝑓either($left, $right)
{
    $allPrimitives = unapply(all(is('bool')));
    $allCallables = unapply(all(is('callable')));
    $eitherPredicate = function (...$args) use ($left, $right) {
        return $left(...$args) || $right(...$args);
    };
    $compareBooleans = function ($left, $right) {
        return $left || $right;
    };

    $f = cond([
        [$allPrimitives, $compareBooleans],
        [$allCallables, always($eitherPredicate)],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($left, $right);
}
