<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('unapply', function (callable $fn, ...$args) {
    return $fn($args);
});
