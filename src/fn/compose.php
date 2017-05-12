<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\collection\head;
use function phln\collection\tail;

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
function compose(callable ...$fns): \Closure
{
    if (0 === count($fns)) {
        throw new \UnderflowException('pipe requires at least one argument');
    }

    $reversed = array_reverse($fns);

    return function (... $args) use ($reversed) {
        return array_reduce(
            tail($reversed),
            function ($carry, callable $fn) {
                return $fn($carry);
            },
            head($reversed)(... $args)
        );
    };
}
