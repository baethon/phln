<?php

declare(strict_types=1);

namespace Baethon\Phln;

const modulo = 'Baethon\\Phln\\modulo';

/**
 * @param numeric $divident
 * @param numeric $divisor
 *
 * @return numeric
 */
function modulo($divident, $divisor)
{
    if (is_float($divident) || is_float($divisor)) {
        return fmod((float) $divident, (float) $divisor);
    }

    return $divident % $divisor;
}
