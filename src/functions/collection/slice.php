<?php

declare(strict_types=1);

namespace Baethon\Phln;

const slice = 'Baethon\\Phln\\slice';

/**
 * @param array<mixed>|string $collection
 * @param int $offset
 * @param int $length
 * @return array<mixed>|string
 * @throws \InvalidArgumentException
 */
function slice ($collection, int $offset, int $length)
{
    if (is_array($collection)) {
        return array_slice($collection, $offset, $length);
    }

    if (is_stringable($collection)) {
        return substr($collection, $offset, $length) ?: '';
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
