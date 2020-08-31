<?php

declare(strict_types=1);

namespace Baethon\Phln;

const sort = 'Baethon\\Phln\\sort';

/**
 * @param array<mixed> $list
 * @param callable(mixed, mixed): int $comparator
 * @return array<mixed>
 * @psalm-pure
 */
function sort (array $list, callable $comparator): array
{
    usort($list, $comparator);
    return $list;
}
