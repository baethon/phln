<?php

declare(strict_types=1);

namespace Baethon\Phln;

const divide = 'Baethon\\Phln\\divide';

/**
 * @param int|float $dividend
 * @param int|float $divisor
 * @return float
 */
function divide($dividend, $divisor): float {
    return $dividend / $divisor;
}
