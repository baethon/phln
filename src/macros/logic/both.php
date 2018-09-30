<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('both', function ($left, $right) {
    $allPrimitives = P::unapply(P::all(P::is('bool')));
    $allCallables = P::unapply(P::all(P::is('callable')));
    $bothPredicate = function (...$args) use ($left, $right) {
        return $left(...$args) && $right(...$args);
    };
    $compareBooleans = function ($left, $right) {
        return $left && $right;
    };

    return P::apply(
        P::cond([
            [$allPrimitives, $compareBooleans],
            [$allCallables, P::always($bothPredicate)],
            [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class)],
        ]),
        [$left, $right]
    );
});
