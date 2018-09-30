<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('find', function (callable $predicate, array $list) {
    foreach ($list as $item) {
        if (true === $predicate($item)) {
            return $item;
        }
    }

    return null;
});
