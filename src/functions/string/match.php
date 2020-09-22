<?php

declare(strict_types=1);

namespace Baethon\Phln;

const match = 'Baethon\\Phln\\match';

/**
 * @param string $test
 * @param string|RegExp $regexp
 * @return string|array<string>|null
 */
function match (string $test, $regexp)
{
    $r = RegExp::of($regexp);
    $matches = $r->matchAll($test);

    return $r->isGlobal() ? $matches : head($matches);
}
