<?php

declare(strict_types=1);

namespace Baethon\Phln;

const any = 'Baethon\\Phln\\any';

/**
 * @param array<mixed>          $list
 * @param callable(mixed): bool $predicate
 */
function any(array $list, callable $predicate): bool
{
    foreach ($list as $value) {
        if (true === $predicate($value)) {
            return true;
        }
    }

    return false;
};
