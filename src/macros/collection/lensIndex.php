<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('collection', 'map');
load_macro('collection', 'update');

// (index, f, xs) => mapWith(replacement => update(index, replacement, xs), f(xs[index]) );

P::macro('lensIndex', function (int $index) {
    return P::lens(
        P::nth($index),
        P::update($index)
    );
});
