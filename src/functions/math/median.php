<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('median', function (array $numbers) {
    sort($numbers, SORT_NUMERIC);
    $middle = count($numbers) / 2;
    $even = (0 === $middle % 2);

    $offsets = $even ? [$middle - 1, 2] : [(int)floor($middle), 1];
    $slice = array_slice($numbers, ...$offsets);

    return P::mean($slice);
});
