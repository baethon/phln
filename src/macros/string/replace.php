<?php
declare(strict_types=1);

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

P::macro('replace', function ($regexp, string $replacement, string $text): string {
    $r = RegExp::of($regexp);
    $limit = $r->isGlobal() ? -1 : 1;

    return preg_replace((string) $r, $replacement, $text, $limit);
});
