<?php

declare(strict_types=1);

namespace Baethon\Phln;

const add = 'Baethon\\Phln\\add';

/**
 * @param int|float $left
 * @param int|float $right
 *
 * @return int|float
 */
function add($left, $right)
{
    assert(is_numeric($left));
    assert(is_numeric($right));

    return $left + $right;
}
