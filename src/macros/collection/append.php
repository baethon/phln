<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('append', function ($value, $collection) {
    $pushToArray = function (array $copy) use ($value) {
        array_push($copy, $value);
        return $copy;
    };

    $f = P::typeCond([
        ['array', $pushToArray],
        ['string', P::partial('\\sprintf', ['%s%s', P::__, $value])],
        [P::otherwise(), P::throwException(\InvalidArgumentException::class, [])]
    ]);

    return $f($collection);
});
