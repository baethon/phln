<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('whereEq', function (array $predicates, $object): bool {
    assert_object($object);

    return P::where(
        P::map(P::equals(), $predicates),
        $object
    );
});
