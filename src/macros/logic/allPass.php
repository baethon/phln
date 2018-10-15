<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('allPass', call_user_func(function () {
    $getArity = P::pipe([
        P::map(P::ref('arity')),
        P::reduce(P::ref('max'), 0),
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
