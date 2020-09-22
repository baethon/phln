<?php

declare(strict_types=1);

namespace Baethon\Phln;

const gt = 'Baethon\\Phln\\gt';

/**
 * @template T
 * @param T $left
 * @param T $right
 * @return bool
 */
function gt ($left, $right): bool
{
    return $left > $right;
}
