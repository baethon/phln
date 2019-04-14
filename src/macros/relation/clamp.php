<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('clamp', function ($min, $max, $value) {
    return P::apply(
        P::pipe(
            P::min($max),
            P::max($min)
        ),
        [$value]
    );
});
