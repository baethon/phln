<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('groupBy', function (callable $fn, array $collection): array {
    return P::reduce(
        function ($carry, $item) use ($fn) {
            $key = $fn($item);
            $innerList = array_key_exists($key, $carry)
                ? $carry[$key]
                : [];

            $carry[$key] = array_merge($innerList, [$item]);

            return $carry;
        },
        [],
        $collection
    );
});
