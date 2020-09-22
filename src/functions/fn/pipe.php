<?php

declare(strict_types=1);

namespace Baethon\Phln;

const pipe = 'Baethon\\Phln\\pipe';

/**
 * Performs left-to-right function composition.
 *
 * The leftmost function may have any arity; the remaining functions must be unary.
 *
 * @param callable ...$fns
 */
function pipe(...$fns): callable
{
    $fnsCount = count($fns);

    if (1 === $fnsCount && is_array($fns[0])) {
        /** @psalm-var array<int,callable> */
        $fns = $fns[0];
        $fnsCount = count($fns);
    }

    assert($fnsCount > 0, new \UnderflowException('pipe requires at least one argument'));

    return function (...$args) use ($fns) {
        $head = $fns[0];
        $tail = array_slice($fns, 1);

        return array_reduce($tail, function ($carry, callable $fn) {
            return $fn($carry);
        }, $head(...$args));
    };
};
