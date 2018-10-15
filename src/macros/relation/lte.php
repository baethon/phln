<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('lte', function ($left, $right): bool {
    return $left <= $right;
});
