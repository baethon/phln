<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('chunk', function (int $size, $collection) {
    $f = P::typeCond([
        ['array', P::partialRight('\\array_chunk', [$size])],
        ['string', P::partialRight('\\str_split', [$size])],
        [P::ref('otherwise'), P::throwException(\InvalidArgumentException::class, [])],
    ]);

    return $f($collection);
});
