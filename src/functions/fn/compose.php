<?php

declare(strict_types=1);

namespace baethon\phln;

const compose = 'baethon\\phln\\compose';

/**
 * Performs left-to-right function composition.
 *
 * The leftmost function may have any arity; the remaining functions must be unary.
 *
 * @param callable ...$fns
 * @return callable
 */
function compose (...$fns): callable {
    $fnsCount = count($fns);

    if (1 === $fnsCount && is_array($fns[0])) {
        $fns = $fns[0];
        $fnsCount = count($fns);
    }

    assert($fnsCount > 0, new \UnderflowException('compose requires at least one argument'));

    return pipe(array_reverse($fns));
};
