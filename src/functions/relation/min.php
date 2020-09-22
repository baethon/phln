<?php

declare(strict_types=1);

namespace Baethon\Phln;

const min = 'Baethon\\Phln\\min';

/**
 * @template T
 * @param T $left
 * @param T $right
 * @return T
 */
function min ($left, $right)
{
    return $left < $right
        ? $left
        : $right;
}
