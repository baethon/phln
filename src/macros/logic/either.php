<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('type', 'is');

P::macro('either', call_user_func(function () {
    $allPrimitives = P::unapply(P::all(P::is('bool')));
    $allCallables = P::unapply(P::all(P::is('callable')));

    $compareBooleans = function ($left, $right) {
        return $left || $right;
    };

    $eitherPredicate = function ($left, $right) {
        return function (...$args) use ($left, $right) {
            return $left(...$args) || $right(...$args);
        };
    };

    $either = P::cond([
        [$allPrimitives, $compareBooleans],
        [$allCallables, $eitherPredicate],
        [P::otherwise(), P::throwException(\InvalidArgumentException::class, [])],
    ]);

    return function ($left, $right) use ($either) {
        return $either($left, $right);
    };
}));
