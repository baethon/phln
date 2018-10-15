<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('always', function ($value): \Closure {
    return function () use ($value) {
        return $value;
    };
});
