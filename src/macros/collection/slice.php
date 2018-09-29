<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('slice', 3, function (int $offset, int $length, $collection) {
    return P::apply(
        P::typeCond([
            ['array', P::partialRight('\\array_slice', [$offset, $length])],
            ['string', P::partialRight('\\substr', [$offset, $length])],
            [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class)],
        ]),
        [$collection]
    );
});
