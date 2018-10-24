<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\Structure\Functor;
use function Baethon\Phln\load_macro;

load_macro('fn', 'nAry');

P::macro('map', function (callable $fn, $collection) {
    assert(is_array($collection) || $collection instanceof Functor);

    return is_array($collection)
        ? array_map($fn, $collection)
        : $collection->map($fn);
});
