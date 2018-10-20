<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('reverse', P::typeCond([
    ['array', '\\array_reverse'],
    ['string', '\\strrev'],
    [P::otherwise(), P::throwException(\InvalidArgumentException::class, [])],
]));
