<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('tap', function (callable $fn, $value) {
    $fn($value);
    return $value;
});
