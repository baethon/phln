<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('filter', function (callable $predicate, array $list): array {
    return array_values(array_filter($list, $predicate));
});
