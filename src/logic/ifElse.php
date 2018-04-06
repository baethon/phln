<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use function phln\fn\curryN;

const ifElse = '\\phln\\logic\\ifElse';
const 𝑓ifElse = '\\phln\\logic\\𝑓ifElse';

/**
 * Creates a function that will process either the `onTrue` or the `onFalse` function depending upon the result of the condition predicate.
 *
 * @phlnSignature (*... -> Boolean) -> (*... -> *) -> (*... -> *) -> (*... -> *)
 * @phlnCategory logic
 * @param callable $predicate
 * @param callable $onTrue
 * @param callable $onFalse
 * @return \Closure
 * @example
 *      $modulo15 = \phln\fn\swap(\phln\math\modulo)(15);
 *      $fizzbuzz = \phln\login\ifElse(
 *          \phln\fn\compose(\phln\relation\equals(0), $modulo15),
 *          \phln\fn\always('fizzbuzz'),
 *          \phln\fn\identity
 *      );
 *
 *      $fizzbuzz(15); // 'fizzbuzz'
 *      $fizzbuzz(1); // 1
 */
function ifElse(callable $predicate = null, callable $onTrue = null, callable $onFalse = null): \Closure
{
    return curryN(3, 𝑓ifElse, func_get_args());
}

function 𝑓ifElse(callable $predicate, callable $onTrue, callable $onFalse): \Closure
{
    return function (...$args) use ($predicate, $onTrue, $onFalse) {
        return $predicate(...$args) ? $onTrue(...$args) : $onFalse(...$args);
    };
}
