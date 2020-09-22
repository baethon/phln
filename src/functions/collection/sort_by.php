<?php

declare(strict_types=1);

namespace Baethon\Phln;

const sort_by = 'Baethon\\Phln\\sort_by';

/**
 * @param array<mixed>           $list
 * @param callable(mixed): mixed $mapper
 *
 * @return array<mixed>
 * @psalm-pure
 */
function sort_by(array $list, callable $mapper): array
{
    $column = array_map($mapper, $list);
    array_multisort($column, \SORT_REGULAR, $list);

    return $list;
}
