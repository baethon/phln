<?php

declare(strict_types=1);

namespace Baethon\Phln;

const replace = 'Baethon\\Phln\\replace';

/**
 * @param string|RegExp $regexp
 */
function replace(string $text, $regexp, string $replacement): string
{
    $r = RegExp::of($regexp);
    $limit = $r->isGlobal() ? -1 : 1;

    $result = preg_replace((string) $r, $replacement, $text, $limit);
    $error = preg_last_error();

    if (\PREG_NO_ERROR !== $error) {
        throw new \RuntimeException("PCRE regex execution error (code: {$error})");
    }

    return "{$result}";
}
