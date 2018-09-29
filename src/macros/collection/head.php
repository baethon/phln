<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('head', function ($collection) {
    $sliceFirst = P::slice(0, 1);
    $moreThanZero = P::compose([P::lte(1), P::ref('length')]);
    $headOfArray = P::cond([
        [$moreThanZero, P::compose(['\\current', $sliceFirst])],
        [P::ref('otherwise'), P::always(null)],
    ]);
    $headOfString = P::cond([
        [$moreThanZero, $sliceFirst],
        [P::ref('otherwise'), P::always('')],
    ]);

    return P::apply(
        P::typeCond([
            ['array', $headOfArray],
            ['string', $headOfString],
            [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class)],
        ]),
        [$collection]
    );
});
