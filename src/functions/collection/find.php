<?php

declare(strict_types=1);

namespace Baethon\Phln;

const find = 'Baethon\\Phln\\find';

/**
 * Find and return value using given predicate.
 *
 * @param callable(mixed):bool $predicate
 * @param array<mixed>         $list
 *
 * @return mixed|null
 */
function find(array $list, callable $predicate)
{
    foreach ($list as $item) {
        if (true === $predicate($item)) {
            return $item;
        }
    }

    return null;
}
