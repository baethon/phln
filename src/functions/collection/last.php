<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('logic', 'isEmpty');

P::macro('last', call_user_func(function () {
    $lastElement = P::slice(-1, 1);
    $lastOfArray = P::pipe(
        $lastElement,
        P::ifElse(P::isEmpty(), P::always(null), '\\current')
    );

    return P::unary(
        P::typeCond([
            ['array', $lastOfArray],
            ['string', $lastElement],
            [P::otherwise(), P::throwException(\InvalidArgumentException::class, [])],
        ])
    );
}));
