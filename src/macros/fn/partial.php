<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Takes a function `f` and a list of arguments, and returns a function `g`.
 * When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
 *
 * Special placeholder value `\phln\fn\__` may be used to specify "gaps", allowing partial application of any combination of arguments, regardless of their positions.
 *
 * @phlnSignature ((a, b, c, ..., n) -> x) -> [a, b, c, ...] -> ((d, e, f, ..., n) -> x)
 * @phlnCategory function
 * @param callable $fn
 * @param array $args
 * @return \Closure
 * @example
 *      $subtractFive = P::partial(P::subtract, [P::__, 5]);
 *      $subtractFive(10); // 5
 */
P::curried('partial', 2, function (callable $fn, array $args): \Closure {
    $mergeArguments = function (array $args, array $innerArgs) {
        $mapped = [];

        foreach ($args as $value) {
            if (P::__ === $value) {
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
});
