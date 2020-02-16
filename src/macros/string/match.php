<?php

declare(strict_types=1);

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

P::macro('match', function ($regexp, string $test) {
    $r = RegExp::of($regexp);
    $matches = $r->matchAll($test);

    return $r->isGlobal() ? $matches : P::head($matches);
});
