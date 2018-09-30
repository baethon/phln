<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('max', function ($a, $b) {
    return max($a, $b);
});
