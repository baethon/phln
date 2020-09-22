<?php

declare(strict_types=1);

namespace Baethon\Phln;

const init = 'Baethon\\Phln\\init';

/**
 * @param mixed $collection
 *
 * @return string|array<mixed>
 */
function init($collection)
{
    if (is_array($collection)) {
        /* @var array<mixed> $collection */
        return array_slice($collection, 0, -1);
    }

    if (is_stringable($collection)) {
        /* @var string $collection */
        return substr($collection, 0, -1);
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
