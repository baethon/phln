<?php

declare(strict_types=1);

namespace Baethon\Phln;

const filter = 'Baethon\\Phln\\filter';

/**
 * Use predicate to keep elements in the array
 *
 * @param array<mixed> $list
 * @param callable(mixed):bool $predicate
 * @return array<mixed>
 */
function filter (array $list, callable $predicate): array {
    return array_values(array_filter($list, $predicate));
}
