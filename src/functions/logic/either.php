<?php

declare(strict_types=1);

namespace Baethon\Phln;

const either = 'Baethon\\Phln\\either';

/**
 * @template T of callable|mixed
 * @param T $left
 * @param T $right
 * @return mixed
 * @psalm-return (
 *      T is callable
 *      ? callable(mixed): bool
 *      : bool
 * )
 */
function either ($left, $right)
{
    if (is_callable($left) && is_callable($right)) {
        return function ($value) use ($left, $right) {
            return $left($value) || $right($value);
        };
    }

    return $left || $right;
}
