<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('collection', 'map');
load_macro('collection', 'update');

// (index, f, xs) => mapWith(replacement => update(index, replacement, xs), f(xs[index]) );

P::macro('lensIndex', function (int $index, callable $fn, array $collection) {
    return P::map(
        function ($replacement) use ($index, $collection) {
            return P::update($index, $replacement, $collection);
        },
        $fn($collection[$index])
    );
});
