<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('apply', function (callable $fn, array $arguments) {
    return $fn(...$arguments);
});
