<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lte = 'Baethon\\Phln\\lte';

/**
 * @template T
 * @param T $left
 * @param T $right
 * @return bool
 */
function lte ($left, $right): bool
{
    return $left <= $right;
}
