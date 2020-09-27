<?php

declare(strict_types=1);

namespace Baethon\Phln;

const is_hashmap = 'Baethon\\Phln\\is_hashmap';

/**
 * @param mixed $value
 * @return bool
 */
function is_hashmap($value): bool
{
    return is_array($value) || is_object($value);
}
