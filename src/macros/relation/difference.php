<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('difference', function (array $left, array $right): array {
    return P::compose([P::ref('values'), '\\array_diff'])($left, $right);
});
