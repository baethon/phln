<?php

declare(strict_types=1);

namespace Baethon\Phln;

const all = 'Baethon\\Phln\\all';

/**
 * @param array<mixed>          $list
 * @param callable(mixed): bool $predicate
 */
function all(array $list, callable $predicate): bool
{
    foreach ($list as $value) {
        if (!$predicate($value)) {
            return false;
        }
    }

    return true;
};
