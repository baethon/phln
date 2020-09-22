<?php

declare(strict_types=1);

namespace Baethon\Phln;

const map_indexed = 'Baethon\\Phln\\map_indexed';

/**
 * @param array<mixed, mixed>          $list
 * @param callable(mixed, mixed):mixed $fn
 *
 * @return array<mixed, mixed>
 */
function map_indexed(array $list, callable $fn): array
{
    $keys = array_keys($list);
    $mapped = array_map($fn, $list, $keys);

    return array_combine($keys, $mapped) ?: [];
};
