<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('fromPairs', function (array $pairs): array {
    return array_reduce(
        $pairs,
        function ($carry, $item) {
            list ($key, $value) = $item;

            return array_merge($carry, [$key => $value]);
        },
        []
    );
});
