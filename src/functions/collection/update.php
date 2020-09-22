<?php

declare(strict_types=1);

namespace Baethon\Phln;

const update = 'Baethon\\Phln\\update';

/**
 * @param array<mixed> $collection
 * @param mixed        $value
 *
 * @return array<mixed>
 * @psalm-pure
 */
function update(array $collection, int $index, $value): array
{
    if (false === array_key_exists($index, $collection)) {
        return $collection;
    }

    $collection[$index] = $value;

    return $collection;
}
