<?php

declare(strict_types=1);

namespace Baethon\Phln;

const gte = 'Baethon\\Phln\\gte';

/**
 * @template T
 *
 * @param T $left
 * @param T $right
 */
function gte($left, $right): bool
{
    return $left >= $right;
}
