<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('multiply', function ($a, $b) {
    return $a * $b;
});
