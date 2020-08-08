<?php

declare(strict_types=1);

namespace Baethon\Phln;

const chunk = 'Baethon\\Phln\\chunk';

/**
 * @param mixed $collection
 * @param int $size
 * @return array<int,mixed>
 * @throws \InvalidArgumentException
 * @psalm-immutable
 */
function chunk ($collection, int $size): array {
    if ($size < 1) {
        throw new \InvalidArgumentException('Size must be >= 1');
    }

    if (is_array($collection)) {
        /** @var array $collection */
        return array_chunk($collection, $size);
    }

    if (is_stringable($collection)) {
        /** @var string $collection */
        return str_split("{$collection}", $size) ?: [];
    }

    throw new \InvalidArgumentException('Unsupported collection type');
};
