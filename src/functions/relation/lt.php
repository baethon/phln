<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lt = 'Baethon\\Phln\\lt';

/**
 * @template T
 *
 * @param T $left
 * @param T $right
 */
function lt($left, $right): bool
{
    return $left < $right;
}
