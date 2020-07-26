<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('isEmpty', function ($value): bool {
    switch (gettype($value)) {
        case 'array':
            return [] === $value;
        case 'string':
            return '' === $value;
        case 'object':
            return [] === (array) $value;
        default:
            return false;
    }
});
