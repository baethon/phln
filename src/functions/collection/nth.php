<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('nth', function (int $n, array $list) {
    $index = $n < 0 ? count($list) + $n : $n;

    return isset($list[$index]) ? $list[$index] : null;
});
