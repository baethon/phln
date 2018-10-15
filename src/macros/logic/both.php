<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('type', 'is');
load_macro('logic', 'cond');

P::macro('both', call_user_func(function () {
    $allPrimitives = P::unapply(P::all(P::is('bool')));
    $allCallables = P::unapply(P::all(P::is('callable')));

    $bothPredicate = function ($left, $right) {
        return function (...$args) use ($left, $right) {
            return $left(...$args) && $right(...$args);
        };
    };

    $compareBooleans = function ($left, $right) {
        return $left && $right;
    };

    $both = P::cond([
        [$allPrimitives, $compareBooleans],
        [$allCallables, $bothPredicate],
        [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class, [])],
    ]);

    return function ($left, $right) use ($both) {
        return $both($left, $right);
    };
}));
