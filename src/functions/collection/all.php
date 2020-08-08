<?php

declare(strict_types=1);

namespace Baethon\Phln;

const all = 'Baethon\\Phln\\all';

function all (array $list, callable $predicate): bool {
    foreach ($list as $value) {
        if (! $predicate($value)) {
            return false;
        }
    }

    return true;
};
