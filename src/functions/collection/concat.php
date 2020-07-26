<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('logic', 'cond');
load_macro('collection', 'map');
load_macro('relation', 'equals');
load_macro('fn', ['T', 'unapply', 'compose', 'throwException']);

P::macro('concat', call_user_func(function () {
    $argsToTypes = P::unapply(P::map('\\gettype'));
    $matchesType = function (string $type) use ($argsToTypes) {
        return P::compose(P::equals([$type, $type]), $argsToTypes);
    };

    return P::curryN(2, P::cond([
        [$matchesType('string'), P::curryN(3, '\\sprintf', ['%s%s'])],
        [$matchesType('array'), P::curryN(2, '\\array_merge')],
        [P::otherwise(), P::throwException(
            \InvalidArgumentException::class,
            ['Passed arguments are not supported']
        )]
    ]));
}));
