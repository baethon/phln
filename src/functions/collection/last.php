<?php

declare(strict_types=1);

namespace Baethon\Phln;

const last = 'Baethon\\Phln\\last';

/**
 * @param mixed $collection
 * @return mixed
 * @throws \InvalidArgumentException
 */
function last ($collection) {
    if (is_array($collection)) {
        /** @var array<mixed> $collection */
        return ($collection === [])
            ? null
            : array_slice($collection, -1, 1)[0];
    }

    if (is_stringable($collection)) {
        /** @var string $collection */
        return substr($collection, -1, 1);
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
