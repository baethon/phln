<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('eqProps', function (string $prop, $left, $right): bool {
    return P::apply(
        P::pipe([
            P::map(P::prop($prop)),
            P::apply(P::equals()),
        ]),
        [[$left, $right]]
    );
});
