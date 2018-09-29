<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('lte', 2, function ($left, $right): bool {
    return $left <= $right;
});
