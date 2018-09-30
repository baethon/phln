<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('any', function (callable $predicate, array $list): bool {
    foreach ($list as $value) {
        if (true === $predicate($value)) {
            return true;
        }
    }

    return false;
});
