<?php

declare(strict_types=1);

namespace Baethon\Phln;

const test = 'Baethon\\Phln\\test';

/**
 * @param string|RegExp $regexp
 */
function test(string $string, $regexp): bool
{
    return RegExp::of($regexp)->test($string);
}
