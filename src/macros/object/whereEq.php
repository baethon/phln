<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('whereEq', function (array $predicates, $object): bool {
    assertObject($object);

    return P::where(
        P::map(P::equals(), $predicates),
        $object
    );
});
