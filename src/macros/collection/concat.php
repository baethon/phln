<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('concat', function ($a, $b) {
    $getTypes = P::unapply(P::map('\\gettype'));
    $matchesType = function (string $type) use ($getTypes) {
        return P::compose([P::equals([$type, $type]), $getTypes]);
    };

    return P::apply(
        P::cond([
            [$matchesType('string'), P::curryN(3, '\\sprintf', ['%s%s'])],
            [$matchesType('array'), P::curryN(2, '\\array_merge')],
            [P::otherwise(), P::throwException(
                \InvalidArgumentException::class,
                ['Passed arguments are not supported']
            )]
        ]),
        [$a, $b]
    );
});
