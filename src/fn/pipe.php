<?php
declare(strict_types=1);

namespace phln\fn;

/**
 * Performs left-to-right function composition.
 * The leftmost function may have any arity; the remaining functions must be unary.
 *
 * **Note**: The result of pipe is not automatically curried.
 *
 * @phlnSignature (((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)) -> (a, b, ..., n) -> z)
 * @phlnCategory function
 * @param \callable[] ...$fns
 * @return \Closure
 * @throws \UnderflowException
 */
function pipe(callable ...$fns): \Closure
{
    if (0 === count($fns)) {
        throw new \UnderflowException('pipe requires at least one argument');
    }

    return function (... $args) use ($fns) {
        $head = $fns[0];
        $tail = array_slice($fns, 1);

        return array_reduce($tail, function ($carry, callable $fn) {
            return $fn($carry);
        }, $head(... $args));
    };
}
