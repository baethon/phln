<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('propEq', function (string $prop, $value, $object): bool {
    assertObject($object);

    return P::apply(
        P::pipe([
            P::prop($prop),
            P::equals($value),
        ]),
        [$object]
    );
});
