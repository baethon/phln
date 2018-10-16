<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('intersection', function (array $left, array $right): array {
    return P::compose([P::values(), '\\array_intersect'])($left, $right);
});
