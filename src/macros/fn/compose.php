<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Performs left-to-right function composition.
 * The leftmost function may have any arity; the remaining functions must be unary.
 *
 * **Note**: The result of pipe is not automatically curried.
 *
 * @phlnSignature [((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)] -> (a, b, ..., n) -> z)
 * @phlnCategory function
 * @param callable[] ...$fns
 * @return \Closure
 * @throws \UnderflowException
 */
P::macro('compose', function (array $fns): \Closure {
    if (0 === count($fns)) {
        throw new \UnderflowException('compose requires at least one argument');
    }

    return P::pipe(array_reverse($fns));
});
