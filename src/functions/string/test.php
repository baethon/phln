<?php

declare(strict_types=1);

namespace Baethon\Phln;

const test = 'Baethon\\Phln\\test';

/**
 * @param string $string
 * @param string|RegExp $regexp
 * @return bool
 */
function test (string $string, $regexp): bool
{
    return RegExp::of($regexp)->test($string);
}
