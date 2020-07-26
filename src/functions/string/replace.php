<?php

declare(strict_types=1);

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

P::macro('replace', function ($regexp, string $replacement, string $text): string {
    $r = RegExp::of($regexp);
    $limit = $r->isGlobal() ? -1 : 1;

    $result = preg_replace((string) $r, $replacement, $text, $limit);
    $error = preg_last_error();

    if ($error !== \PREG_NO_ERROR) {
        throw new \RuntimeException("PCRE regex execution error (code: {$error})");
    }

    return "{$result}";
});
