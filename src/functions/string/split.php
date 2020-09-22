<?php

declare(strict_types=1);

namespace Baethon\Phln;

const split = 'Baethon\\Phln\\split';

/**
 * @param string|RegExp $delimiter
 *
 * @return array<string>
 */
function split(string $text, $delimiter): array
{
    $result = preg_split((string) RegExp::of($delimiter), $text);
    $error = preg_last_error();

    if (\PREG_NO_ERROR !== $error) {
        throw new \RuntimeException("PCRE regex execution error (code: {$error})");
    }

    return $result ?: [];
}
