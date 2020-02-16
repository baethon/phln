<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('propEq', function (string $prop, $value, $object): bool {
    assert_object($object);

    return P::apply(
        P::pipe(
            P::prop($prop),
            P::equals($value)
        ),
        [$object]
    );
});
