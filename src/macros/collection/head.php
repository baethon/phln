<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', ['identity', 'unary']);
load_macro('relation', 'lte');
load_macro('logic', 'ifElse');
load_macro('type', ['typeCond', 'is']);
load_macro('collection', ['slice', 'length', 'nth']);

P::macro('head', call_user_func(function () {
    $sliceFirst = P::slice(0, 1);
    $moreThanZero = P::compose([P::lte(1), P::length()]);
    $headOfArray = P::cond([
        [$moreThanZero, P::nth(0)],
        [P::otherwise(), P::always(null)],
    ]);

    $headOfString = P::cond([
        [$moreThanZero, $sliceFirst],
        [P::otherwise(), P::always('')],
    ]);

    return P::unary(
        P::typeCond([
            ['array', $headOfArray],
            ['string', $headOfString],
            [P::otherwise(), P::throwException(\InvalidArgumentException::class, [])],
        ])
    );
}));
