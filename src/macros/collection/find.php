<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('find', 2, function (callable $predicate, array $list) {
    foreach ($list as $item) {
        if (true === $predicate($item)) {
            return $item;
        }
    }

    return null;
});
