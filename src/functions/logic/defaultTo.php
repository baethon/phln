<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('defaultTo', function ($default, $value) {
    return is_null($value) ? $default : $value;
});
