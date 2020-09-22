<?php

declare(strict_types=1);

namespace Baethon\Phln;

const prepend = 'Baethon\\Phln\\prepend';

/**
 * @param string|array<mixed> $collection
 * @param mixed $value
 * @return string|array<mixed>
 * @psalm-pure
 * @psalm-return (
 *      $collection is string
 *      ? string
 *      : array<mixed>
 * )
 */
function prepend ($collection, $value)
{
    if (is_array($collection)) {
        array_unshift($collection, $value);
        return $collection;
    }

    if (is_stringable($collection)) {
        return "{$value}{$collection}";
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
