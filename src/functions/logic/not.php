<?php

declare(strict_types=1);

namespace Baethon\Phln;

const not = 'Baethon\\Phln\\not';

/**
 * @param mixed $value
 */
function not($value): bool
{
    return !$value;
}
