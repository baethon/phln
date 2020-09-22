<?php

declare(strict_types=1);

namespace Baethon\Phln;

const split = 'Baethon\\Phln\\split';

/**
 * @param string $text
 * @param string|RegExp $delimiter
 * @return array
 */
function split (string $text, $delimiter): array
{
    $result = preg_split((string) RegExp::of($delimiter), $text);
    $error = preg_last_error();

    if ($error !== \PREG_NO_ERROR) {
        throw new \RuntimeException("PCRE regex execution error (code: {$error})");
    }

    return $result ?: [];
}
