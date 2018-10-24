<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('update', function (int $index, $value, array $collection): array {

    if (false === array_key_exists($index, $collection)) {
        return $collection;
    }

    $collection[$index] = $value;

    return $collection;
});
