<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('sort', function (callable $comparator, array $list): array {
    usort($list, $comparator);
    return $list;
});
