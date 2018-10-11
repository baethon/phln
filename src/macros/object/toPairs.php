<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('toPairs', function ($object): array {
    assertObject($object);

    $pairs = [];

    foreach ($object as $key => $value) {
        $pairs[] = [$key, $value];
    }

    return $pairs;
});
