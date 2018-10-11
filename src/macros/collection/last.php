<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('last', function ($list) {
    $lastElement = P::slice(-1, 1);
    $lastOfArray = P::pipe([
        $lastElement,
        P::ifElse(P::ref('isEmpty'), P::always(null), '\\current'),
    ]);

    $f = P::typeCond([
        ['array', $lastOfArray],
        ['string', $lastElement],
        [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class, [])],
    ]);

    return $f($list);
});
