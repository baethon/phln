<?php

declare(strict_types=1);

namespace Baethon\Phln;

const is_empty = 'Baethon\\Phln\\is_empty';

/**
 * @param mixed $value
 * @return bool
 */
function is_empty ($value): bool {
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
};
