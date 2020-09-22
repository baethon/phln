<?php

declare(strict_types=1);

namespace Baethon\Phln;

const compose = 'Baethon\\Phln\\compose';

/**
 * Performs left-to-right function composition.
 *
 * The leftmost function may have any arity; the remaining functions must be unary.
 *
 * @param callable ...$fns
 */
function compose(...$fns): callable
{
    $fnsCount = count($fns);

    if (1 === $fnsCount && is_array($fns[0])) {
        /** @psalm-var array<int,callable> */
        $fns = $fns[0];
        $fnsCount = count($fns);
    }

    assert($fnsCount > 0, new \UnderflowException('compose requires at least one argument'));

    return pipe(...array_reverse($fns));
};
