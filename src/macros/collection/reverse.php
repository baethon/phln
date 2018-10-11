<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('reverse', function ($collection) {
    return P::apply(
        P::typeCond([
            ['array', '\\array_reverse'],
            ['string', '\\strrev'],
            [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class, [])],
        ]),
        [$collection]
    );
});
