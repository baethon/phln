<?php

declare(strict_types=1);

namespace Baethon\Phln;

const equals = 'Baethon\\Phln\\equals';

/**
 * Check if given values are equal.
 *
 * Uses strict comparision.
 *
 * @template T
 *
 * @param T $left
 * @param T $right
 */
function equals($left, $right): bool
{
    return $left === $right;
}
