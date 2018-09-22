<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\collection\head;
use function phln\collection\tail;

const compose = '\\phln\\fn\\compose';

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
function compose(array $fns): \Closure
{
    if (0 === count($fns)) {
        throw new \UnderflowException('compose requires at least one argument');
    }

    return pipe(array_reverse($fns));
}
