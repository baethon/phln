<?php

declare(strict_types=1);

namespace Baethon\Phln;

const from_pairs = 'Baethon\\Phln\\from_pairs';

/**
 * Convert list of key-value pairs to hash map.
 *
 * @param array<array{string, mixed}> $collection
 *
 * @return array<string, mixed>
 */
function from_pairs(array $collection): array
{
    return reduce(
        $collection,
        function ($carry, $item) {
            list($key, $value) = $item;

            return array_merge($carry, [$key => $value]);
        },
        []
    );
}
