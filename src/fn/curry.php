<?php
declare(strict_types=1);

namespace phln\fn;

const curry = '\\phln\\fn\\curry';

/**
 * Returns a curried equivalent of the provided function.
 *
 * Curried function doesn't require providing arguments one at a time.
 * If `f` is a ternary function and `g` is `\phln\fn\curry(f)`, the following are equivalent.
 *      * g(1)(2)(3)
 *      * g(1)(2, 3)
 *      * g(1, 2)(3)
 *      * g(1, 2, 3)
 *
 * @phlnSignature (* → a) → (* → a)
 * @phlnCategory function
 * @param callable $fn
 * @param array ...$args
 * @return \Closure|mixed
 */
function curry(callable $fn, ...$args)
{
    $argumentsLength = (new \ReflectionFunction($fn))->getNumberOfParameters();
    $argumentsLengthMatch = function (array $arguments) use ($argumentsLength) {
        return count($arguments) >= $argumentsLength;
    };

    $wrapper = function (...$wrapperArguments) use ($fn, $args, $argumentsLengthMatch) {
        $combined = array_merge($args, $wrapperArguments);
        return $argumentsLengthMatch($combined) ? $fn(...$combined) : curry($fn, ...$combined);
    };

    return $argumentsLengthMatch($args) ? $fn(...$args) : $wrapper;
}

