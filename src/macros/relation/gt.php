<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('gt', function ($a, $b): bool {
    return $a > $b;
});
