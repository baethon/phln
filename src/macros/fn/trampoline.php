<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\TrampolineThunk;

P::macro('trampoline', function (callable $fn) {
    $wrapper = new TrampolineThunk($fn);

    return function (...$args) use ($wrapper) {
        $result = $wrapper(...$args);

        while ($result instanceof \Closure) {
            $result = $result();
        }

        return $result;
    };
});
