<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('relation', 'max');

P::macro('allPass', call_user_func(function () {
    $getArity = P::pipe([
        P::map(P::raw('arity')),
        P::reduce(P::max(), 0),
    ]);

    return function (array $predicates) use ($getArity): callable {
        return P::curryN($getArity($predicates), function (...$values) use ($predicates) {
            return P::reduce(
                function ($carry, callable $p) use ($values) {
                    return (false === $carry) ? false : $p(...$values);
                },
                true,
                $predicates
            );
        });
    };
}));
