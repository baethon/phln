<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('flatMap', 2, function (callable $mapper, array $list): array {
    return P::apply(
        P::pipe([
            P::map($mapper),
            P::ref('collapse'),
        ]),
        [$list]
    );
});
