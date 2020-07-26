<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('collection', 'reduce');

P::macro('fromPairs', P::reduce(
    function ($carry, $item) {
        list ($key, $value) = $item;

        return array_merge($carry, [$key => $value]);
    },
    []
));
