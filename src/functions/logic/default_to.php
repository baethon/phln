<?php

declare(strict_types=1);

namespace Baethon\Phln;

const default_to = 'Baethon\\Phln\\default_to';

/**
 * @param mixed $value
 * @param mixed $default
 * @return mixed
 */
function default_to ($value, $default) {
    return $value ?? $default;
}
