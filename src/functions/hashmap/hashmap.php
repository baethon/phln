<?php

declare(strict_types=1);

namespace Baethon\Phln;

const hashmap = 'Baethon\\Phln\\hashmap';

/**
 * Convert given value to associative array
 *
 * If the given value is an object with `toArray()` method,
 * it will use this method to create an array.
 *
 * @param array<mixed>|object $value
 * @return array<string, mixed>
 */
function hashmap($value): array
{
    assert(is_hashmap($value), 'Value has to be a valid hashmap');

    if (is_array($value)) {
        return $value;
    }

    if (method_exists($value, 'toArray')) {
        return $value->toArray();
    }

    return (array) $value;
}
