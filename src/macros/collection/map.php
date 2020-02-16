<?php

declare(strict_types=1);

use Baethon\Phln\Duck;
use Baethon\Phln\Phln as P;

P::macro('map', function (callable $fn, $collection) {
    assert(is_array($collection) || Duck::isFunctor($collection));

    return is_array($collection)
        ? array_map($fn, $collection)
        : $collection->map($fn);
});
