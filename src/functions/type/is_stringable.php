<?php

declare(strict_types=1);

namespace Baethon\Phln;

const is_stringable = 'Baethon\\Phln\\is_stringable';

/**
 * Check if given value is stringable.
 *
 * @param mixed $value
 * @psalm-pure
 */
function is_stringable($value): bool
{
    if (is_string($value)) {
        return true;
    }

    if (is_object($value) && method_exists($value, '__toString')) {
        return true;
    }

    return false;
}
