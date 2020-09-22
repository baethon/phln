<?php

declare(strict_types=1);

namespace Baethon\Phln;

const both = 'Baethon\\Phln\\both';

/**
 * @template T of callable|mixed
 *
 * @param T $left
 * @param T $right
 *
 * @return mixed
 * @psalm-return (
 *      T is callable
 *      ? callable(mixed): bool
 *      : bool
 * )
 */
function both($left, $right)
{
    if (is_callable($left) && is_callable($right)) {
        return static function ($value) use ($left, $right): bool {
            return $left($value) && $right($value);
        };
    }

    return $left && $right;
}
