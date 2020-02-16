<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\RegExp;

P::macro('split', function ($delimiter, string $text): array {
    $result = preg_split((string) RegExp::of($delimiter), $text);
    $error = preg_last_error();

    if ($error !== \PREG_NO_ERROR) {
        throw new \RuntimeException("PCRE regex execution error (code: {$error})");
    }

    return $result ?: [];
});
