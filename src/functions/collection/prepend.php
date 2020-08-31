<?php

declare(strict_types=1);

namespace Baethon\Phln;

const prepend = 'Baethon\\Phln\\prepend';

/**
 * @template T of <string|array>
 * @param T $collection
 * @return T
 * @psalm-immutable
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
