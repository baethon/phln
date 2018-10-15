<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('length', function ($collection): int {
    return P::apply(
        P::cond([
            ['\\is_countable', '\\count'],
            [P::is('string'), '\\mb_strlen'],
            [P::ref('otherwise'), P::throwException(
                \InvalidArgumentException::class,
                ['Unable to return length of given collection']
            )],
        ]),
        [$collection]
    );
});
