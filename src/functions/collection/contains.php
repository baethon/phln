<?php

declare(strict_types=1);

namespace Baethon\Phln;

const contains = 'Baethon\\Phln\\contains';

/**
 * Check if collection contains given value.
 *
 * Uses strict check.
 *
 * @param mixed $collection
 * @param mixed $value
 * @return bool
 */
function contains ($collection, $value): bool {
    if (is_array($collection)) {
        /** @var array $collection */
        return in_array($value, $collection, true);
    }

    if (is_stringable($collection)) {
        /** @var string $collection */
        return !! strstr($collection, $value);
    }

    return false;
};
