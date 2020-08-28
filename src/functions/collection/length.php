<?php

declare(strict_types=1);

namespace Baethon\Phln;

const length = 'Baethon\\Phln\\length';

/**
 * @param \Countable|array<mixed>|string $collection
 * @return int
 */
function length ($collection): int
{
    assert(is_countable($collection) or is_string($collection));

    return is_countable($collection)
        ? count($collection)
        : mb_strlen($collection);
}
