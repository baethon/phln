<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('contains', function ($value, $collection): bool {
    $stringContains = P::partialRight('\\strstr', [$value]);

    return P::apply(
        P::typeCond([
            ['array', P::any(P::equals($value))],
            ['string', P::both(P::ref('T'), $stringContains)],
            [P::ref('otherwise'), P::ref('F')]
        ]),
        [$collection]
    );
});
