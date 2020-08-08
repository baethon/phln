<?php

declare(strict_types=1);

namespace Baethon\Phln;

const append = 'Baethon\\Phln\\append';

/**
 * @param mixed $collection
 * @param mixed $value
 * @return array<mixed>|string
 * @throws \InvalidArgumentException
 * @psalm-immutable
 */
function append ($collection, $value) {
    $collectionType = gettype($collection);

    if ($collectionType === 'array') {
        /** @var array<mixed> $collection */
        $collection[] = $value;
        return $collection;
    }

    if (is_stringable($collection) && is_stringable($value)) {
        /** @var string $collection */
        /** @var string $value */
        return "{$collection}{$value}";
    }

    throw new \InvalidArgumentException('Unsupported collection type');
};
