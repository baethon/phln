<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('toPairs', function ($object): array {
    assert_object($object);

    $pairs = [];

    foreach ($object as $key => $value) {
        $pairs[] = [$key, $value];
    }

    return $pairs;
});
