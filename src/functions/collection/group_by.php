<?php

declare(strict_types=1);

namespace Baethon\Phln;

const group_by = 'Baethon\\Phln\\group_by';

/**
 * @param array<array<string, mixed>>            $collection
 * @param callable(array<string, mixed>): string $fn
 *
 * @return array<string, array<string, mixed>>
 */
function group_by(array $collection, callable $fn): array
{
    return reduce(
        $collection,
        function ($carry, $item) use ($fn) {
            $key = $fn($item);
            $innerList = array_key_exists($key, $carry)
                ? $carry[$key]
                : [];

            $carry[$key] = array_merge($innerList, [$item]);

            return $carry;
        },
        []
    );
};
