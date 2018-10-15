<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('modulo', function ($a, $b) {
    return $a % $b;
});
