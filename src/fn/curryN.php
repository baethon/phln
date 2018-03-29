<?php
declare(strict_types=1);

namespace phln\fn;

const curryN = '\\phln\\fn\\curryN';

/**
 * Returns a curried equivalent of the provided function, with the specified arity.
 *
 * Curried function doesn't require providing arguments one at a time.
 * If `f` is a ternary function and `g` is `\phln\fn\curryN(3, f)`, the following are equivalent.
 *      * g(1)(2)(3)
 *      * g(1)(2, 3)
 *      * g(1, 2)(3)
 *      * g(1, 2, 3)
 *
 * @phlnSignature Number -> (* → a) → (* → a)
 * @phlnCategory function
 * @param int $n
 * @param callable $fn
 * @param array $args
 * @return \Closure|mixed
 */
function curryN(int $n, callable $fn, array $args = [])
{
    $args = array_filter($args, function ($value) {
        return $value !== null;
    });

    $argumentsLengthMatch = function (array $arguments) use ($n) {
        return count($arguments) >= $n;
    };

    $wrapper = function (...$wrapperArguments) use ($fn, $args, $argumentsLengthMatch, $n) {
        $combined = array_merge($args, $wrapperArguments);
        return $argumentsLengthMatch($combined) ? $fn(...$combined) : curryN($n, $fn, $combined);
    };

    return $argumentsLengthMatch($args) ? $fn(...$args) : $wrapper;
}
