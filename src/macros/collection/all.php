<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('all', 2, function (callable $predicate, array $list): bool {
    foreach ($list as $value) {
        if (false === $predicate($value)) {
            return false;
        }
    }

    return true;
});
