<?php
declare(strict_types=1);

namespace phln\fn;

const __ = '_phln_fn_partial_placeholder';

const partial = '\\phln\\fn\\partial';
const 𝑓partial = '\\phln\\fn\\𝑓partial';

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`.
 * When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * Special placeholder value `\phln\fn\__` may be used to specify "gaps", allowing partial application of any combination of arguments, regardless of their positions.
 *
 * @phlnSignature ((a, b, c, ..., n) -> x) -> [a, b, c, ...] -> ((d, e, f, ..., n) -> x)
 * @phlnCategory function
 * @param string|callable $fn
 * @param string|array ...$args
 * @return \Closure
 * @example
 *      $subtractFive = \phln\fn\partial(\phln\math\subtract, \phln\fn\__, 5);
 *      $subtractFive(10); // 5
 */
function partial($fn = nil, $args = nil): \Closure
{
    return curryN(2, 𝑓partial, [$fn, $args]);
}

function 𝑓partial(callable $fn, array $args): \Closure
{
    $mergeArguments = function (array $args, array $innerArgs) {
        $mapped = [];

        foreach ($args as $value) {
            if (__ === $value) {
                $mapped[] = array_shift($innerArgs);
            } else {
                $mapped[] = $value;
            }
        }

        return array_merge($mapped, $innerArgs);
    };

    return function (...$innerArgs) use ($fn, $args, $mergeArguments) {
        return $fn(...$mergeArguments($args, $innerArgs));
    };
}
