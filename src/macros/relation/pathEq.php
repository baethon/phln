<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('pathEq', function (string $path, $value, array $object): bool {
    return P::apply(
        P::pipe(
            P::path($path),
            P::equals($value),
        ),
        [$object]
    );
});
