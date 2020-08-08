<?php

declare(strict_types=1);

namespace Baethon\Phln;

const any = 'Baethon\\Phln\\any';

function any (array $list, callable $predicate): bool {
    foreach ($list as $value) {
        if (true === $predicate($value)) {
            return true;
        }
    }

    return false;
};
