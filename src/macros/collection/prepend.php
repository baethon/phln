<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('prepend', function ($value, $collection) {
    $arrayPrepend = function (array $copy) use ($value) {
        array_unshift($copy, $value);
        return $copy;
    };

    return P::apply(
        P::typeCond([
            ['array', $arrayPrepend],
            ['string', P::curryN(3, '\\sprintf', ['%s%s', $value])],
            [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class, [])],
        ]),
        [$collection]
    );
});
